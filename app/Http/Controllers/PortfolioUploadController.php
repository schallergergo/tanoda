<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Portfolio;
use App\Http\Requests\Portfolio\LogoRequest;
use App\Http\Requests\Portfolio\FlierRequest;
use App\Http\Requests\Portfolio\CatalogRequest;
use App\Http\Requests\Portfolio\BusinessCardRequest;
use App\Http\Requests\Portfolio\PresentationRequest;
use App\Http\Requests\Portfolio\StandImageRequest;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;

class PortfolioUploadController extends Controller
{


    public function logoUpload (LogoRequest $request, Portfolio $portfolio)
    {
        //$this->authorize('update', Portfolio::class);
        $file=$portfolio->logo;
        $this->upload($request,$portfolio,"logo");
        $this->deleteIfExists($file);
        return $response;
        
    }

     public function flierUpload (FlierRequest $request, Portfolio $portfolio)
    {
        //$this->authorize('update', Portfolio::class);
        $file=$portfolio->flyer;
        $this->upload($request,$portfolio,"flyer");
        $this->deleteIfExists($file);
        return $response;
        
    }

     public function catalogUpload (CatalogRequest $request, Portfolio $portfolio)
    {
        //$this->authorize('update', Portfolio::class);
        $file=$portfolio->catalog;
        $response = $this->upload($request,$portfolio,"catalog");
        $this->deleteIfExists($file);
        return $response;
    }

         public function businessCardUpload (BusinessCardRequest $request, Portfolio $portfolio)
    {
        //$this->authorize('update', Portfolio::class);
        $file=$portfolio->business_card;
        $response = $this->upload($request,$portfolio,"business_card");
        $this->deleteIfExists($file);
        return $response;
    }

         public function presentationUpload (PresentationRequest $request, Portfolio $portfolio)
    {
        //$this->authorize('update', Portfolio::class);
        $file=$portfolio->presentation;
        $response = $this->upload($request,$portfolio,"presentation");
        $this->deleteIfExists($file);
        return $response;
    }

         public function standImageUpload (StandImageRequest $request, Portfolio $portfolio)
    {
        //$this->authorize('update', Portfolio::class);
        $file=$portfolio->stand_image;
        $response = $this->upload($request,$portfolio,"stand_image");
        $this->deleteIfExists($file);
        return $response;
    }

    private function upload($request,Portfolio $portfolio, $attributeName){
        $data=$request->validated();;
        $file = $request->file($attributeName)->store('portfolios/'.$portfolio->id);
        $path = Storage::url($file);
        $portfolio->update([$attributeName=>$file]);
        return response()->json(["success"=>true,"message"=>__("File has been saved"),"data"=>[$attributeName=>$path]], 200);
    }

    private function deleteIfExists($file){
        if ($file==null) return ;
         if (Storage::exists($file)) Storage::delete($file);
    }
}
