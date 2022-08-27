<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Supplier;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Requests\StoreSupplierRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateSupplier implements ShouldQueue
{
    use Dispatchable;

    private $author;
    private $title;
    private $email;
    private $phone;
    private $address;
    private $brands;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        User $author,
        string $title,
        string $email,
        string $phone,
        ?string $address,
        array $brands = []
    )
    {
        $this->author = $author;
        $this->title = $title;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->brands = $brands;
    }

    public static function fromRequest(StoreSupplierRequest $request): self
    {
        return new static(
            $request->author(),
            $request->title(),
            $request->email(),
            $request->phone(),
            $request->address(),
            $request->brands(),
        );
    }

    public function handle(): Supplier
    {
        $supplier = new Supplier([
            'title' => $this->title,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);

        $supplier->authoredBy($this->author);
        $supplier->save();

        $supplier->brands()->sync($this->author);

        return $supplier;
    }
}