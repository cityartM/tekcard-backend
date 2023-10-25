<?php

namespace App\Support\DataTable;


class DataTableActions
{

    private bool $showBtn = false;
    private string $showRoute;

    private ?string $html = "";

    private bool $deleteBtn = false;
    private bool $deleteActionInModel = false;
    private string $deleteRoute;

    private bool $editBtn = false;
    private string $editRoute;

    private string $switcherModel;
    private int $switcherModelId;
    private ?string $switcher_column_name = "status";

    private bool $status = false;

    public function edit(string $route): DataTableActions
    {
        $this->editBtn = true;
        $this->editRoute = $route;
        return $this;
    }

    public function show(string $route): DataTableActions
    {
        $this->showBtn = true;
        $this->showRoute = $route;
        return $this;
    }

    public function button($html = ""): DataTableActions
    {
        $this->html = $html;
        return $this;
    }

    public function delete(string $route, bool $actionInModel = true): DataTableActions
    {
        $this->deleteBtn = true;
        $this->deleteActionInModel = $actionInModel;
        $this->deleteRoute = $route;

        return $this;
    }

    public function make(): string
    {
        $html = '<a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Action
                    <i class="ki-duotone ki-down fs-5 ms-1"></i>
                  </a>
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">';
        if ($this->showBtn) {
            $html .= '<div class="menu-item px-3">
                         <a href="' . $this->showRoute . '" class="menu-link px-3">
                         <i class="ki-duotone ki-eye fs-3 m-1">
                         <span class="path1"></span>
                         <span class="path2"></span>
                         <span class="path3"></span>
                        </i>
                         '.__('app.show').'</a>
                      </div>';
        }

        if ($this->editBtn) {
            $html .= '<div class="menu-item px-3">
                         <a href="' . $this->editRoute . '" class="menu-link px-3">
                         <i class="ki-duotone ki-pencil fs-3 m-1"><span class="path1"></span><span class="path2"></span></i>
                         '.__('app.edit').'
                         </a>
                      </div>';
        }
        if ($this->deleteBtn) {
            $html .= '<div class="menu-item px-3">
                        <a href="'. $this->deleteRoute .'" class="menu-link px-3 delete_confirm"
                           title="'.__('app.delete').'"
                           data-toggle="tooltip"
                           data-method="DELETE"
                           data-confirm-title="'.__('app.please_confirm').'"
                           data-confirm-text="'.__('app.are_you_sure_that_you_want_to_delete_this_row').'"
                           data-confirm-delete="'.__('app.yes_delete_it').'"
                           data-confirm-cancel="'.__('app.no_cancel').'"
                        >
                        <i class="ki-duotone ki-trash fs-3 m-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                            '.__('app.delete').'
                        </a>
                     </div>';
        }
        $html .= $this->html;

        $html .= "</div>";

        return $html;
    }

    public function makeOld(): string
    {
        $html = '<div class="d-flex justify-content-center flex-shrink-0">';
        if ($this->showBtn) {
            $html .= '<a href="' . $this->showRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="currentColor"></path>
                        <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>';
        }
        if ($this->editBtn) {
            $html .= '<a href="' . $this->editRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                    </svg>
                </span>
            </a>';
        }
        $html .= $this->html;
        if ($this->deleteBtn) {
            if ($this->deleteActionInModel) {
                $html .= '<a data-bs-toggle="modal" data-bs-target="#delete" href="javascript:;" data-href="' . $this->deleteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
            } else {
                $html .= '<a href="' . $this->deleteRoute . '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">';
            }
            $html .= '<span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                    </svg>
                </span>
            </a>';
        }
        $html .= "</div>";
        return $html;
    }

    public function model(object $model): DataTableActions
    {
        $this->switcherModel = get_class($model);
        return $this;
    }

    public function column(string $column_name = "status"): DataTableActions
    {
        $this->switcher_column_name = $column_name;
        return $this;
    }

    public function modelId($model_id): DataTableActions
    {
        $this->switcherModelId = $model_id;
        return $this;
    }

    public function checkStatus($status): DataTableActions
    {
        $this->status = $status;
        return $this;
    }

    public function switcher(): string
    {
        $html = '<label class="form-check form-switch form-check-custom form-check-solid justify-content-around">';
        $html .= '<input class="form-check-input w-50px switcher" type="checkbox" data-modelId="' . $this->switcherModelId . '" data-model="' . $this->switcherModel . '" data-columnName="' . $this->switcher_column_name . '" ' . ($this->status == 1 ? 'checked="checked"' : '') . '>';
        $html .= '</label>';
        return $html;
    }

    public static function image($imageUrl): string
    {
        $html = "<div class='symbol symbol-50px me-5'>";
        $html .= "<img src='$imageUrl' alt='image' />";
        $html .= "</div>";
        return $html;
    }

    public static function icon($imageUrl): string
    {
        $html = "<div class='symbol symbol-50px me-5' style='color: #0BB783'>";
        $html .= "$imageUrl";
        $html .= "</div>";
        return $html;
    }

    public function avatar($imageUrl,$name,$email): string
    {
        $html = "<div class='d-flex align-items-center'>";
        $html .= "<div class='symbol symbol-circle symbol-50px overflow-hidden me-3'>";
        $html .= "<a href='#'>";
        $html .= "<div class='symbol-label'>";
        $html .= "<img class='w-100' src='$imageUrl' alt='image'  />";
        $html .= "</a>";
        $html .= "</div>";
        $html .= "</div>";
        $html .= "<div class='d-flex flex-column'>";
        $html .= "<a href='#' class='text-gray-800 text-hover-primary mb-1'>$name</a>";
        $html .= "<span>$email</span>";
        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }

    public function color($colorCode): string
    {
        return "<div style='width: 30px;height:30px;/*margin: auto;*/border-radius: 50%;background-color: " . $colorCode . "'></div>";
    }

    public static function statuses($code, $status): string
    {
        return '<span class="badge badge-light-' . $code . '">' . $status . '</span>';
    }

    // public static function Share($links, $name): string
    // {
    //     return '<a href="' . url('https://api.whatsapp.com/send?text=' . urlencode($links)) . '" target="__blank">' . $name . ' <span class="menu-icon ml-5"><i class="bi bi-share fs-3"></i></span></a> ';
    // }
    public static function share($links, $name): string
    {
        return '<a href="' . url('https://api.whatsapp.com/send?text=' . urlencode($links)) . '" target="__blank">' . $name . ' <span class="menu-icon ml-5"><i class="bi bi-share fs-3"></i></span></a> ' .
            '<span class="copy-link" onclick="copyToClipboard(\''. $links . '\')"><i class="bi bi-files fs-3"></i></span>';
    }
}
