<?php

namespace App\Http\Livewire\Manager;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Application as App;

class Application extends Component
{

    use WithFileUploads;

    public App $application;
    public $app = [];
    public $photo;

    public function mount()
    {
        $this->application = App::first();
        $this->app = App::first()->toArray();
    }

    public function updateApplicationInformation()
    {

        $this->application->update([
            'name'         => $this->app['name'],
            'alias'         => $this->app['alias'],
            'email'         => $this->app['email'],
            'line1'         => $this->app['line1'],
            'line2'         => $this->app['line2'],
            'slogan'         => $this->app['slogan'],
            'motto'         => $this->app['motto'],
            'fax'         => $this->app['fax'],
            'address'         => $this->app['address'],
            'description'         => $this->app['description'],
            'order_invoice_alias'         => $this->app['order_invoice_alias'],
            'transac_report_alias'         => $this->app['transac_report_alias'],
            'decimal_number'         => $this->app['decimal_number'],
            'symbol'         => $this->app['symbol'],
            'currency'         => $this->app['currency'],
            'tax'         => $this->app['tax'],
            'section'         => $this->app['section'],
        ]);

        if (isset($this->photo)) {
            File::delete(storage_path('app/' .$this->application->image));
            $this->application->update(['image' => $this->photo->store('applications', 'public')]);
            return redirect()->route('setting.index');
        }

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');

    }

    public function deleteApplicationPhoto()
    {
        App::first()->update([
            'image' => null,
        ]);

        $this->emit('refresh-navigation-menu');
    }
    
    
    public function render()
    {
        return view('livewire.manager.application', [
            'countries' => Country::all()
        ]);
    }
}