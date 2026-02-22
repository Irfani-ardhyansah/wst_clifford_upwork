<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GresbConsultation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class GRESBWaterController extends Controller
{
    public function index(Request $request)
    {
        return view('member_dashboard.gresb_water.index');
    }

    public function form(Request $request)
    {
        $user = Auth::user();
        return view('member_dashboard.gresb_water.form', compact('user'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'company'        => 'required|string|max:255',
            'phone'          => 'nullable|string|max:20',
            'portfolio_size' => 'nullable|integer',
            'interest'       => 'nullable|string',
            'notes'          => 'nullable|string',
            'time_preference' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) {
                    $selected = Carbon::parse($value);
                    $now = now()->startOfMinute();

                    if ($selected->lt($now)) {
                        $fail('The meeting time must be in the future.');
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please fix the form errors.');
        }

        GresbConsultation::create($validator->validated());

        return redirect()
            ->back()
            ->with('success', 'Consultation request submitted successfully!');
    }

    public function update(Request $request, $id) {
        $consultation = GresbConsultation::findOrFail($id);

        $validated = $request->validate([
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'email'          => 'required|email|max:255',
            'company'        => 'required|string|max:255',
            'phone'          => 'nullable|string|max:20',
            'portfolio_size' => 'nullable|integer',
            'interest'       => 'nullable|string',
            'time_preference'=> 'nullable|date|after:now',
            'notes'          => 'nullable|string',
        ]);

        $consultation->update($validated);

        return redirect()->back()->with('success', 'Consultation updated successfully!');
    }

    public function destroy($id) {
        $consultation = GresbConsultation::findOrFail($id);
        $consultation->delete();

        return redirect()->back()->with('success', 'Consultation deleted successfully!');
    }

    public function adminIndex(Request $request)
    {
        $query = GresbConsultation::query();

        if ($request->has('search')) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('company', 'like', '%' . $request->search . '%');
        }

        $consultations = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.gresb_water.index', compact('consultations'));
    }

    public function updateStatus(Request $request, $id)
    {
        $consultation = GresbConsultation::findOrFail($id);
        $consultation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}