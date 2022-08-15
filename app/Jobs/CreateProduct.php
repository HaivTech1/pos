<?php

namespace App\Jobs;

use Picqer;
use App\Models\User;
use App\Models\Product;
use App\Services\SaveCode;
use App\Services\SaveCodeService;
use App\Http\Requests\ProductRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateProduct implements ShouldQueue
{
    use Dispatchable;
    
    private $author;
    private $title;
    private $price;
    private $quantity;
    private $discount;
    private $brand;
    private $image;
    private $description;
    private $category;
    
    public function __construct(
        User $author,
        string $title,
        string $price,
        int $quantity,
        ?string $discount,
        string $brand,
        ?array $image = [],
        string $description,
        string $category
    )
    {
        $this->author = $author;
        $this->title = $title;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->discount = $discount;
        $this->brand = $brand;
        $this->image = $image;
        $this->description = $description;
        $this->category = $category;
    }

    public static function fromRequest(ProductRequest $request): self
    {
        return new static(
            $request->author(),
            $request->title(),
            $request->price(),
            $request->quantity(),
            $request->discount(),
            $request->brand(),
            $request->image(),
            $request->description(),
            $request->category(),
        );
    }
    
    public function handle(): Product
    {
        $product = new Product([
            'title'                 => $this->title,
            'price'                 => $this->price,
            'quantity'              => $this->quantity,
            'discount'              => $this->discount,
            'brand_id'              => $this->brand,
            'description'           => $this->description,
            'product_category_id'   => $this->category,
            'author_id'             => $this->author->id()
        ]);

        SaveCode::Generator(new Product, $product, 'code');

        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
        file_put_contents('storage/products/barcodes/' . $product->title() . '.jpg',
            $barcodes = $generator->getBarcode($product->title(), $generator::TYPE_CODE_128, 3, 50)
        );

        $product->barcode = $product->title . '.jpg';

        if($this->image)
        {
            foreach($this->image as $file)
            {
                $name = uniqid() . '_' . time(). '.' . $file->getClientOriginalExtension();
                $path = storage_path('app/public/products/') ;
                $file->move($path, $name);
                $Imgdata[] = $name;
            }
        }
        else
        {
            $Imgdata = 'noimg';
        }

        $product->image = json_encode($Imgdata);
        $product->save();


        return $product;
    }
}