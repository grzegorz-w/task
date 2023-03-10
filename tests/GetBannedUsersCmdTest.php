<?php

namespace Tests;

class GetBannedUsersCmdTest extends TestCase
{
    /*
     * LUMEN By default has limited options for testing comand lines that why I can't easily test it
     * For exampel there isn no ->assertExitCode(0) or ->assertExpectedOutpu();
     */

    /**
     *
     * @return void
     */
    public function test_get_users()
    {
        $result = $this->artisan('banned-users:get');
        $this->assertEquals(0,$result);
//            ->assertExitCode(0);
    }

//    public function test_get_users_sort_by_mail()
//    {
//        $this->artisan('banned-users:get')
//            ->assertExitCode(0);
//    }
//
//    /**
//     *  --active-users-only, get all the users that have been banned and that have been activated;
//     **/
//    public function test_get_active_user()
//    {
//        $this->artisan('banned-users:get' , ['active-users-only'])
//            ->assertExitCode(0);
//    }
//
//    /**
//     * --trashed-only, get all the users that have been banned and that have been both deleted;
//     * @return void
//     */
//    public function test_get_deleted_user()
//    {
//        $this->artisan('banned-users:get')
//            ->assertExitCode(0);
//    }
//
//    /**
//     *  --with-trashed, get all the users that have been banned and that have been both deleted or not;
//     * @return void
//     */
//    public function test_get_only_deleted_user()
//    {
//        $this->artisan('banned-users:get' , ['with-trashed'])
//            ->assertExitCode(0);
//    }
//
//    /**
//     * --admin-only, get all the users that have been banned and have related admin role;
//     * @return void
//     */
//    public function test_get_admin_user()
//    {
//        $this->artisan('banned-users:get' , ['admin-only'])
//            ->assertExitCode(0);
//    }
//
//    /**
//     * --no-admin, get all the users that have been banned and have no related admin role;
//     * @return void
//     */
//    public function test_get_non_admin_only_user()
//    {
//        $this->artisan('banned-users:get' , ['no-admin'])
//            ->assertExitCode(0);
//    }
//
//    /**
//     * sort-by={field-name} (optional), the field on which sort the output;
//     * {sort-by=email}
//     * @return void
//     */
//    public function test_get_users_sorted_by_mail()
//    {
//        $this->artisan('banned-users:get' , ['sort-by=email'])
//            ->assertExitCode(0);
//    }
//
//    /**
//     * //{save-to?}
//     * save-to={output/file/absolute/path}, if set, save the list on output file too.
//     * @return void
//     */
//    public function test_get_is_csv_saved()
//    {
//        $this->artisan('banned-users:get' , ['save-to'])
//            ->assertExitCode(0);
//    }
//
//    /**
//     *--with-headers, if set, print and save the column headers too;
//     * @return void
//     */
//    public function test_get_users_with_headers()
//    {
//        $this->artisan('banned-users:get' , ['no-admin'])
//            ->assertExitCode(0);
//    }
}
