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
use App\Models\ActivityLog;
use Auth;

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
        if ($business_nature->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type');
            $log->class = "Business Nature";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateBusiness()
    {
        $id = request('id');
        $business_nature = BusinessNature::findOrFail($id);
        $business_nature->type = request('type');
        if ($business_nature->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type');
            $log->class = "Business Nature";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyBusiness($id)
    {
        $business_nature = BusinessNature::findOrFail($id);
        if ($business_nature->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $business_nature->type;
            $log->class = "Business Nature";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Categories of Land
    public function storeCategory()
    {
        $categories_of_land = New CategoriesOfLand();
        $categories_of_land->category = request('category');
        if ($categories_of_land->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('category');
            $log->class = "Categories of Land";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateCategory()
    {
        $id = request('id');
        $categories_of_land = CategoriesOfLand::findOrFail($id);
        $categories_of_land->category = request('category');
        if ($categories_of_land->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('category');
            $log->class = "Categories of Land";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyCategory($id)
    {
        $categories_of_land = CategoriesOfLand::findOrFail($id);
        if ($categories_of_land->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $categories_of_land->category;
            $log->class = "Business Nature";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Consents
    public function storeConsent()
    {
        $consent = New Consent();
        $consent->consent = request('consent');
        if ($consent->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('consent');
            $log->class = "Consent";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateConsent()
    {
        $id = request('id');
        $consent = Consent::findOrFail($id);
        $consent->consent = request('consent');
        if ($consent->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('consent');
            $log->class = "Consent";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyConsent($id)
    {
        $consent = Consent::findOrFail($id);
        if ($consent->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $consent->consent;
            $log->class = "Consent";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Consultant Roles
    public function storeRole()
    {
        $role = New ConsultantRole();
        $role->type = request('type');
        if ($role->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type');
            $log->class = "Consultant Role";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateRole()
    {
        $id = request('id');
        $role = ConsultantRole::findOrFail($id);
        $role->type = request('type');
        if ($role->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type');
            $log->class = "Consultant Role";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyRole($id)
    {
        $role = ConsultantRole::findOrFail($id);
        if ($role->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $role->type;
            $log->class = "Consultant Role";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Land Acquisition Status
    public function storeStatus()
    {
        $status = New LandAcquisitionStatus();
        $status->status = request('status');
        if ($status->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('status');
            $log->class = "Land Acquisition Status";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateStatus()
    {
        $id = request('id');
        $status = LandAcquisitionStatus::findOrFail($id);
        $status->status = request('status');
        if ($status->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('status');
            $log->class = "Land Acquisition Status";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyStatus($id)
    {
        $status = LandAcquisitionStatus::findOrFail($id);
        if ($status->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $status->status;
            $log->class = "Land Acquisition Status";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Land Classification
    public function storeClassification()
    {
        $classification = New LandClassification();
        $classification->classification = request('classification');
        if ($classification->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('classification');
            $log->class = "Land Classification";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateClassification()
    {
        $id = request('id');
        $classification = LandClassification::findOrFail($id);
        $classification->classification = request('classification');
        if ($classification->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('classification');
            $log->class = "Land Classification";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyClassification($id)
    {
        $classification = LandClassification::findOrFail($id);
        if ($classification->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $classification->classification;
            $log->class = "Land Classification";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Library Types
    public function storeLibrary()
    {
        $library_type = New LibraryType();
        $library_type->type = request('type');
        if ($library_type->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type');
            $log->class = "Library Type";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateLibrary()
    {
        $id = request('id');
        $library_type = LibraryType::findOrFail($id);
        $library_type->type = request('type');
        if ($library_type->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('type');
            $log->class = "Library Type";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyLibrary($id)
    {
        $library_type = LibraryType::findOrFail($id);
        if ($library_type->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $library_type->type;
            $log->class = "Library Type";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Project Status
    public function storeProject()
    {
        $status = New ProjectStatus();
        $status->project_status = request('status');
        if ($status->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('status');
            $log->class = "Project Status";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateProject()
    {
        $id = request('id');
        $status = ProjectStatus::findOrFail($id);
        $status->project_status = request('status');
        if ($status->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('status');
            $log->class = "Project Status";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyProject($id)
    {
        $status = ProjectStatus::findOrFail($id);
        if ($status->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $status->project_status;
            $log->class = "Project Status";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }

    //Type of Agreement
    public function storeAgreement()
    {
        $nature = New RegisteredProprietorNature();
        $nature->nature = request('nature');
        if ($nature->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('nature');
            $log->class = "Type of Agreement";
            $log->action = "Add";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function updateAgreement()
    {
        $id = request('id');
        $nature = RegisteredProprietorNature::findOrFail($id);
        $nature->nature = request('nature');
        if ($nature->save()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = request('nature');
            $log->class = "Type of Agreement";
            $log->action = "Update";

            $log->save();
        }
        return redirect('/settings/others');
    }
    public function destroyAgreement($id)
    {
        $nature = RegisteredProprietorNature::findOrFail($id);
        if ($nature->delete()) {
            $log = New ActivityLog();

            $log->user_id = Auth::id();
            $log->name = $nature->nature;
            $log->class = "Type of Agreement";
            $log->action = "Delete";

            $log->save();
        }
        return redirect('/settings/others');
    }
}
