<?php

namespace App\Http\Controllers\Backend;

use App\Configuration;
use App\Exports\ConfigurationsExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Imports\ConfigurationImport;
use Maatwebsite\Excel\Facades\Excel;
use Spm\Zipper\Facades\Zipper;

class ConfigurationController extends Controller
{
    
    public function general(){

        return view('backend.config.general')->with([
            'general' => Configuration::find(1) ? json_decode(Configuration::find(1)->general) : '',
        ]
        );
    }

    public function home(){

        return view('backend.config.home')->with([
            'home' => Configuration::find(1) ? json_decode(Configuration::find(1)->home) : '',
        ]
        );

    }

    public function company(){

        return view('backend.config.company')->with([
            'company' => Configuration::find(1) ? json_decode(Configuration::find(1)->company) : '',
        ]
        );
    }

    public function chatRRSScontact(){
        return view('backend.config.chat-rrss-contact')->with([
            'chat_contact_social' => Configuration::find(1) ? json_decode(Configuration::find(1)->chat_contact_social) : '',
            'configuration' => $this,
        ]
        );
    }

    public function email(){
        return view('backend.config.email')->with([
            'email' => Configuration::find(1) ? json_decode(Configuration::find(1)->email_server) : '',
        ]
        );
    }

    public function popup(){
        return view('backend.config.popup')->with([
            'popup' => Configuration::find(1) ? json_decode(Configuration::find(1)->popup) : '',
        ]
        );
    }

    public function updateGeneral(Request $request, Configuration $configuration)
    {

        $general = Configuration::find(1);

        $request_array = $request->except('_token', '_method');
        $request_array['icon'] = $this->addAndStore($request, 'icon', 'general', $general);
        $request_array['fav_icon'] = $this->addAndStore($request, 'fav_icon', 'general' , $general);

        if($general){
            
            $this->verifyAndDeleteImage($request_array, 'icon', $general->general);
            $this->verifyAndDeleteImage($request_array, 'fav_icon', $general->general);

            $general->general = json_encode($request_array);
            $general->save();

        }else{

            $configuration = new Configuration;
            $configuration->general = json_encode($request_array);
            $configuration->save();
        }

        return redirect()->back()->with([
            'general' => Configuration::find(1) ? json_decode(Configuration::find(1)->general) : '',
        ]
        );

    }

    public function updateHome(Request $request, Configuration $configuration)
    {
        $home = Configuration::find(1);
        
        $request_array = $request->except('_token', '_method');
        $request_array['image_1'] = $this->addAndStore($request, 'image_1', 'home', $home);
        $request_array['image_2'] = $this->addAndStore($request, 'image_2', 'home', $home);
        $request_array['image_3'] = $this->addAndStore($request, 'image_3', 'home', $home);
        $request_array['icon_image_1'] = $this->addAndStore($request, 'icon_image_1', 'home', $home);
        $request_array['icon_image_2'] = $this->addAndStore($request, 'icon_image_2', 'home', $home);
        $request_array['icon_image_3'] = $this->addAndStore($request, 'icon_image_3', 'home', $home);
        $request_array['icon_image_4'] = $this->addAndStore($request, 'icon_image_4', 'home', $home);
        $request_array['banner_image'] = $this->addAndStore($request, 'banner_image', 'home', $home);

        if($home){
            $this->verifyAndDeleteImage($request_array, 'image_1', $home->home);
            $this->verifyAndDeleteImage($request_array, 'image_2', $home->home);
            $this->verifyAndDeleteImage($request_array, 'image_3', $home->home);
            $this->verifyAndDeleteImage($request_array, 'icon_image_1', $home->home);
            $this->verifyAndDeleteImage($request_array, 'icon_image_2', $home->home);
            $this->verifyAndDeleteImage($request_array, 'icon_image_3', $home->home);
            $this->verifyAndDeleteImage($request_array, 'icon_image_4', $home->home);
            $this->verifyAndDeleteImage($request_array, 'banner_image', $home->home);
            
            $home->home = json_encode($request_array);
            $home->save();

        }else{

            $configuration = new Configuration;
            $configuration->home = json_encode($request_array);
            $configuration->save();
        }

        return redirect()->back();

    }

    public function updateCompany(Request $request, Configuration $configuration)
    {
        $company = Configuration::find(1);

        $request_array = $request->except('_token', '_method');
        $request_array['image_1'] = $this->addAndStore($request, 'image_1', 'company', $company);
        $request_array['image_2'] = $this->addAndStore($request, 'image_2', 'company', $company);
        $request_array['image_3'] = $this->addAndStore($request, 'image_3', 'company', $company);
        $request_array['banner_image'] = $this->addAndStore($request, 'banner_image', 'company', $company);

        if($company){
            $this->verifyAndDeleteImage($request_array, 'image_1', $company->company);
            $this->verifyAndDeleteImage($request_array, 'image_2', $company->company);
            $this->verifyAndDeleteImage($request_array, 'image_3', $company->company);
            $this->verifyAndDeleteImage($request_array, 'banner_image', $company->company);
            $company->company = json_encode($request_array);
            $company->save();

        }else{

            $configuration = new Configuration;
            $configuration->company = json_encode($request_array);
            $configuration->save();
        }

        return redirect()->back();
    }

    public function updateChatRRSSContact(Request $request, Configuration $configuration)
    {
        $request_array = $request->except('_token', '_method');

        $chatRRSScontact = Configuration::find(1);

        if($chatRRSScontact){
            
            $chatRRSScontact->chat_contact_social = json_encode($request_array);
            $chatRRSScontact->save();

        }else{

            $configuration = new Configuration;
            $configuration->chat_contact_social = json_encode($request_array);
            $configuration->save();
        }

        return redirect()->back();
    }

    public function updateEmail(Request $request, Configuration $configuration)
    {
        $request_array = $request->except('_token', '_method');

        $email = Configuration::find(1);

        if($email){
            
            $email->email_server = json_encode($request_array);
            $email->save();

        }else{

            $configuration = new Configuration;
            $configuration->email_server = json_encode($request_array);
            $configuration->save();
        }

        return redirect()->back();

    }

    public function updatePopup(Request $request, Configuration $configuration){
        $request_array = $request->except('_token', '_method');

        $popup = Configuration::find(1);

        $request_array['image_1'] = $this->addAndStore($request, 'image_1', 'popup', $popup);
        $request_array['image_2'] = $this->addAndStore($request, 'image_2', 'popup', $popup);
        $request_array['image_3'] = $this->addAndStore($request, 'image_3', 'popup', $popup);

        if($popup){
            $this->verifyAndDeleteImage($request_array, 'image_1', $popup->popup);
            $this->verifyAndDeleteImage($request_array, 'image_2', $popup->popup);
            $this->verifyAndDeleteImage($request_array, 'image_3', $popup->popup);
            $popup->popup = json_encode($request_array);
            $popup->save();

        }else{

            $configuration = new Configuration;
            $configuration->popup = json_encode($request_array);
            $configuration->save();
        }

        return redirect()->back();
    }

    public function addAndStore($request, $fileName, $folder, $json){

        if($request->hasFile($fileName)){
            $image = $request->file($fileName);
            $complete_name = $image->getClientOriginalName();
            return $image->storeAs($folder, $complete_name, 'public');
        }else if(isset($json) && isset(json_decode($json->$folder)->$fileName)){
            return json_decode($json->$folder)->$fileName;
        }else{
            return '';
        }
    }

    public function deleteImage($object, $name){
        if(json_decode($object)){
            Storage::disk('public')->delete(json_decode($object)->$name);
        }
    }

    public function verifyAndDeleteImage($request_array, $image_name, $json){
        if($request_array[$image_name] != "" 
                && isset(json_decode($json)->$image_name) 
                && json_decode($json)->$image_name != ""
                && $request_array[$image_name] != json_decode($json)->$image_name){
                    Storage::disk('public')->delete(json_decode($json)->$image_name);
        }
    }

    public static function verifyChat($number){
        if(isset(Configuration::find(1)->chat_contact_social)){
            $chat_contact_social = json_decode(Configuration::find(1)->chat_contact_social);
            foreach ($chat_contact_social->chats as $chat) {
                if($number == $chat){
                    return 'checked';
                }
            }
        }
    }

    public function exportImport(){
        return view('backend.config.export-import');
    }

    public function export(){
        
        return Excel::download(new ConfigurationsExport, 'configurations.xlsx');

    }

    public function import(Request $request){
        
        $request->validate([
            'excel-file' => 'required|mimes:zip',
        ]);

        if($request->hasFile('excel-file')){
            
            $name = str_replace('.zip','',$request->file('excel-file')->getClientOriginalName());
            $excelName = public_path('storage\import') . "\\$name\configurations.xlsx";

            Zipper::setPathToZipFile($request->file('excel-file')->path());
            Zipper::setPathToUnzip(public_path('storage\import'));
            Zipper::unZipFile();

            Excel::import(new ConfigurationImport, $excelName);
        
            Storage::disk('public')->deleteDirectory('company');
            Storage::disk('public')->deleteDirectory('home');
            Storage::disk('public')->deleteDirectory('general');
            Storage::disk('public')->deleteDirectory('popup');
            Storage::disk('public')->move('import\configuration\company', '\company');
            Storage::disk('public')->move('import\configuration\home', '\home');
            Storage::disk('public')->move('import\configuration\general', '\general');
            Storage::disk('public')->move('import\configuration\popup', '\popup');

            Storage::disk('public')->deleteDirectory('import/' . $name);

            session()->flash('status','La importación fue exitosa');

            return redirect()->back();
            
        }

    }

}
