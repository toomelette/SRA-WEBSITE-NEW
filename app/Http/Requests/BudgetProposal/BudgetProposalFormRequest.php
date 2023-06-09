<?php


namespace App\Http\Requests\BudgetProposal;


use App\Swep\Helpers\Helper;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BudgetProposalFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'pap_title' => 'required|string|max:20',
            'pap_code' => [
                'required',
                'string',
                'max:20',
                Rule::unique('ppu_rec_budget','pap_code')->ignore($this->request->get('slug'),'slug'),
            ],
            'pap_desc' => 'nullable|string|max:255',
            'budget_type' => [
                'required',
                Rule::in(Helper::budgetTypes()),
            ],
            'division' => 'required|string|max:255',
            'ps' => 'nullable|string',
            'co' => 'nullable|string',
            'mooe' => 'nullable|string',
            'pcent_share' => 'nullable|numeric|max:100',
        ];
    }
}