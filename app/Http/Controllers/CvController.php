<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
    // Display the list of CVs
    public function list()
    {
        $cvs = Cv::all();
        return view('cv_list', compact('cvs'));
    }

    // Show CV in Template 2
public function show2($id)
{
    $cv = Cv::findOrFail($id);
    return view('cv_show2', compact('cv'));
}

// Show CV in Template 3
public function show3($id)
{
    $cv = Cv::findOrFail($id);
    return view('cv_show3', compact('cv'));
}


    // Show a specific CV
    public function show($id)
    {
        $cv = Cv::findOrFail($id);
        return view('cv_show', compact('cv'));
    }

    // Show the form to create a new CV
    public function create()
    {
        return view('cv_form');
    }

    // Store a newly created CV
    public function store(Request $request)
    {
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'profile' => 'required|string',
            'projects' => 'required|string',
            'education' => 'required|string',
            'skills' => 'required|string',
            'co_curricular' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'linkedin' => 'required|url|max:255',
        ]);

        $cv = new Cv();
        $cv->name = $request->input('name');
        $cv->title = $request->input('title');
        $cv->profile = $request->input('profile');
        $cv->projects = $request->input('projects');
        $cv->education = $request->input('education');
        $cv->skills = $request->input('skills');
        $cv->co_curricular = $request->input('co_curricular');
        $cv->email = $request->input('email');
        $cv->phone = $request->input('phone');
        $cv->linkedin = $request->input('linkedin');

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $cv->profile_image = $imageName;
        }

        $cv->save();

        return redirect()->route('cv.list')->with('success', 'CV created successfully!');
    }

    // Delete a specific CV
    public function destroy($id)
    {
        $cv = Cv::findOrFail($id);
        // Optionally delete associated image
        if ($cv->profile_image) {
            unlink(public_path('images/'.$cv->profile_image));
        }
        $cv->delete();

        return redirect()->route('cv.list')->with('success', 'CV deleted successfully!');
    }

    public function edit($id)
{
    $cv = CV::findOrFail($id);
    return view('cv_edit', compact('cv'));
}

public function update(Request $request, $id)
{
    $cv = CV::findOrFail($id);
    $cv->update($request->all());

    return redirect()->route('cv.list')->with('success', 'CV updated successfully.');
}

public function dashboard(Request $request)
{
    // Get the total number of CVs
    $totalCvs = Cv::count();

    // Get CVs categorized by type
    $categories = Cv::select('category', DB::raw('count(*) as count'))
        ->groupBy('category')
        ->pluck('count', 'category')
        ->toArray();

    // Calculate pie chart data
    $categoriesLabels = array_keys($categories);
    $categoriesValues = array_values($categories);

    // Handle search
    $search = $request->input('search');
    $cvs = Cv::when($search, function ($query, $search) {
        return $query->where('name', 'like', "%{$search}%");
    })->get();

    return view('dashboard', compact('totalCvs', 'categoriesLabels', 'categoriesValues', 'cvs'));
}

}
