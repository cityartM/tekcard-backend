<?php

namespace Modules\ContactUs\DataTable;

use Modules\ContactUs\Models\ContactUs;
use App\Support\DataTable\DataTableActions;
use Exception;
use Log;


class ContactUsDatatable
{

    public static function columns(): array
    {
        return [
            "email",
            "name",
            "company",
            "subject",
            "message",
            "created_at",
        ]; 
    }

    public function datatables($request)
    {
        try {
            return datatables($this->query($request))
                ->addColumn("action", function (ContactUs $contactUs) {
                    return (new DataTableActions())
                        ->delete(route("contactus.destroy", $contactUs->id))
                        ->make();
                })
                ->addColumn("email", function (ContactUs $contactUs) {
                    return $contactUs->email ;
                })
                ->addColumn("name", function (ContactUs $contactUs) {
                    return $contactUs->full_name ;
                })
                ->addColumn("company", function (ContactUs $contactUs) {
                    return $contactUs->company;
                })
                ->addColumn("subject", function (ContactUs $contactUs) {
                    return $contactUs->subject;
                })
                ->addColumn("message", function (ContactUs $contactUs) {
                    return $contactUs->message;
                })
                ->addColumn('created_at', function (ContactUs $contactUs) {
                    return $contactUs->created_at ? $contactUs->created_at->format('Y-m-d') : null;
                })
                ->rawColumns(['action','email','name','company','subject','message', 'created_at'])

                ->make(true);
        } catch (Exception $e) {
            Log::error(get_class($this) . " Error " . $e->getMessage());
        }
    }

    public function query($request)
    {
        $query = ContactUs::query();

        return $query->get();
    }

}
