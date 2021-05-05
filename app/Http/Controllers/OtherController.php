<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessNature;
use App\Models\CategoriesOfLand;
use App\Models\Consent;
use App\Models\ConsultantRole;
use App\Models\LandAcquisitionStatus;
use App\Models\LandClassification;
use App\Models\LibraryType;
use App\Models\ProjectStatus;
use App\Models\RegisteredProprietorNature;

class OtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $business_natures = BusinessNature::all();
        $categories_of_land = CategoriesOfLand::all();
        $consents = Consent::all();
        $consultant_roles = ConsultantRole::all();
        $land_acquisition_status = LandAcquisitionStatus::all();
        $land_classifications = LandClassification::all();
        $library_types = LibraryType::all();
        $project_status = ProjectStatus::all();
        $registered_proprietor_natures = RegisteredProprietorNature::all();

        $data = compact(
            'business_natures',
            'categories_of_land',
            'consents',
            'consultant_roles',
            'land_acquisition_status',
            'land_classifications',
            'library_types',
            'project_status',
            'registered_proprietor_natures'
        );
        return view('settings.others.index',$data);
    }

    //Business Natures
    public function storeBusiness()
    {
        $business_nature = New BusinessNature();
        $business_nature->type = request('type');
        $business_nature->save();
        return redirect('/settings/others');
    }
    public function updateBusiness()
    {
        $id = request('id');
        $business_nature = BusinessNature::findOrFail($id);
        $business_nature->type = request('type');
        $business_nature->save();
        return redirect('/settings/others');
    }
    public function destroyBusiness($id)
    {
        $business_nature = BusinessNature::findOrFail($id);
        $business_nature->delete();
        return redirect('/settings/others');
    }

    //Categories of Land
    public function storeCategory()
    {
        $categories_of_land = New CategoriesOfLand();
        $categories_of_land->category = request('category');
        $categories_of_land->save();
        return redirect('/settings/others');
    }
    public function updateCategory()
    {
        $id = request('id');
        $categories_of_land = CategoriesOfLand::findOrFail($id);
        $categories_of_land->category = request('category');
        $categories_of_land->save();
        return redirect('/settings/others');
    }
    public function destroyCategory($id)
    {
        $categories_of_land = CategoriesOfLand::findOrFail($id);
        $categories_of_land->delete();
        return redirect('/settings/others');
    }

    //Consents
    public function storeConsent()
    {
        $consent = New Consent();
        $consent->consent = request('consent');
        $consent->save();
        return redirect('/settings/others');
    }
    public function updateConsent()
    {
        $id = request('id');
        $consent = Consent::findOrFail($id);
        $consent->consent = request('consent');
        $consent->save();
        return redirect('/settings/others');
    }
    public function destroyConsent($id)
    {
        $consent = Consent::findOrFail($id);
        $consent->delete();
        return redirect('/settings/others');
    }

    //Consultant Roles
    public function storeRole()
    {
        $role = New ConsultantRole();
        $role->type = request('type');
        $role->save();
        return redirect('/settings/others');
    }
    public function updateRole()
    {
        $id = request('id');
        $role = ConsultantRole::findOrFail($id);
        $role->type = request('type');
        $role->save();
        return redirect('/settings/others');
    }
    public function destroyRole($id)
    {
        $role = ConsultantRole::findOrFail($id);
        $role->delete();
        return redirect('/settings/others');
    }

    //Land Acquisition Status
    public function storeStatus()
    {
        $status = New LandAcquisitionStatus();
        $status->status = request('status');
        $status->save();
        return redirect('/settings/others');
    }
    public function updateStatus()
    {
        $id = request('id');
        $status = LandAcquisitionStatus::findOrFail($id);
        $status->status = request('status');
        $status->save();
        return redirect('/settings/others');
    }
    public function destroyStatus($id)
    {
        $status = LandAcquisitionStatus::findOrFail($id);
        $status->delete();
        return redirect('/settings/others');
    }

    //Land Classification
    public function storeClassification()
    {
        $classification = New LandClassification();
        $classification->classification = request('classification');
        $classification->save();
        return redirect('/settings/others');
    }
    public function updateClassification()
    {
        $id = request('id');
        $classification = LandClassification::findOrFail($id);
        $classification->classification = request('classification');
        $classification->save();
        return redirect('/settings/others');
    }
    public function destroyClassification($id)
    {
        $classification = LandClassification::findOrFail($id);
        $classification->delete();
        return redirect('/settings/others');
    }

    //Library Types
    public function storeLibrary()
    {
        $library_type = New LibraryType();
        $library_type->type = request('type');
        $library_type->save();
        return redirect('/settings/others');
    }
    public function updateLibrary()
    {
        $id = request('id');
        $library_type = LibraryType::findOrFail($id);
        $library_type->type = request('type');
        $library_type->save();
        return redirect('/settings/others');
    }
    public function destroyLibrary($id)
    {
        $library_type = LibraryType::findOrFail($id);
        $library_type->delete();
        return redirect('/settings/others');
    }

    //Project Status
    public function storeProject()
    {
        $status = New ProjectStatus();
        $status->project_status = request('status');
        $status->save();
        return redirect('/settings/others');
    }
    public function updateProject()
    {
        $id = request('id');
        $status = ProjectStatus::findOrFail($id);
        $status->project_status = request('status');
        $status->save();
        return redirect('/settings/others');
    }
    public function destroyProject($id)
    {
        $status = ProjectStatus::findOrFail($id);
        $status->delete();
        return redirect('/settings/others');
    }

    //Type of Agreement
    public function storeAgreement()
    {
        $nature = New RegisteredProprietorNature();
        $nature->nature = request('nature');
        $nature->save();
        return redirect('/settings/others');
    }
    public function updateAgreement()
    {
        $id = request('id');
        $nature = RegisteredProprietorNature::findOrFail($id);
        $nature->nature = request('nature');
        $nature->save();
        return redirect('/settings/others');
    }
    public function destroyAgreement($id)
    {
        $nature = RegisteredProprietorNature::findOrFail($id);
        $nature->delete();
        return redirect('/settings/others');
    }
}
