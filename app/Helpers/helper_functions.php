<?php

use Illuminate\Support\Facades\DB;

function active_tabs($tab_1, $tab_2)
{
    session(['tab1' => $tab_1, 'tab2' => $tab_2]);
}

function active_tab1()
{
    return session('tab1');
}

function active_tab2()
{
    return session('tab2');
}

function get_current_user_id() {
    return session('userid');
}
