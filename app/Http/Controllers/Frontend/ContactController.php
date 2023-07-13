<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.pages.contact.index');
    }

    public function store(Request $request)
    {
        $data               = $request->except('_token');
        $data['created_at'] = Carbon::now();

        Contact::insert($data);
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cảm ơn bạn. Chúng tối sẽ sớm liên hệ với bạn'
        ]);

        return redirect()->to('/');
    }

    public function convertWordToPdf()
    {
        $word = new COM("Word.Application") or die ("Could not initialise Object.");
        // set it to 1 to see the MS Word window (the actual opening of the document)
        $word->Visible = 0;
        // recommend to set to 0, disables alerts like "Do you want MS Word to be the default .. etc"
        $word->DisplayAlerts = 0;
        // open the word 2007-2013 document
        $word->Documents->Open('E:\xampp\htdocs\basethesis\public\php.docx');
        // save it as word 2003
        $word->ActiveDocument->SaveAs('E:\xampp\htdocs\basethesis\public\newdocument.doc');
        // convert word 2007-2013 to PDF
        $word->ActiveDocument->ExportAsFixedFormat('E:\xampp\htdocs\basethesis\public\yourdocument.pdf', 17, false, 0, 0, 0, 0, 7, true, true, 2, true, true, false);
        // quit the Word process
        $word->Quit(false);
        // clean up
        unset($word);
    }
}
