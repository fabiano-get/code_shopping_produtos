<?php
/**
 * Created by PhpStorm.
 * User: fabiano
 * Date: 15/10/18
 * Time: 14:25
 */

namespace CodeShopping\common;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait OnlyTrashed
{
    protected function onlyTrashedIfRequested(Request $request, Builder $query) {
        if($request->get( 'trashed')== 1) {
            $query = $query->onlyTrashed();
        }
        return $query;
    }

}