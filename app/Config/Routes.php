<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
service('auth')->routes($routes);

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

//$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/get_users_ajax', 'Dashboard::get_users_ajax');

$routes->get('/bill_invoices', 'BillInvoices::index');
$routes->get('/bill_invoices/(:num)', 'BillInvoices::invoice/$1');
$routes->get('/bill_invoices/get_invoices_ajax', 'BillInvoices::get_invoices_ajax');
//$routes->get('bill_invoices/(:segment)', 'BillInvoices::page/$1');
$routes->get('/bill_positions/get_positions_ajax', 'BillPositions::get_positions_ajax');

$routes->get('/bill_products', 'BillProducts::index');
$routes->get('/bill_products/(:num)', 'BillProducts::product/$1');
$routes->get('/bill_products/get_products_ajax', 'BillProducts::get_products_ajax');

$routes->get('/bill_clients', 'BillClients::index');
$routes->get('/bill_clients/(:num)', 'BillClients::client/$1');
$routes->post('/bill_clients/get_clients_ajax', 'BillClients::get_clients_ajax');

// update all bill products
$routes->get('/billapi/fetchProducts', 'api\BillAPIController::fetchProducts');
$routes->get('/billapi/fetchClients', 'api\BillAPIController::fetchClients');
$routes->get('/billapi/fetchInvoices', 'api\BillAPIController::fetchInvoices');

$routes->get('/meest_parcels', 'MeestParcels::index');
$routes->get('/meest_parcels/(:num)', 'MeestParcels::parcel/$1');
$routes->post('/meest_parcels/get_parcels_ajax', 'MeestParcels::get_parcels_ajax');
$routes->post('/meest_parcels/get_parcel_items_ajax', 'MeestItems::get_parcel_items_ajax');
$routes->get('/meest_parcels/add/(:num)', 'MeestParcels::add/$1');
$routes->post('/meest_parcels/save', 'MeestParcels::save');
$routes->get('/meest_parcels/delete/(:num)', 'MeestParcels::delete/$1');
$routes->get('/meest_parcels/sent/(:num)', 'MeestParcels::sent/$1');

$routes->get('/meest_clients', 'MeestSendersRecipients::index');
$routes->get('/meest_clients/(:num)', 'MeestSendersRecipients::clients/$1');
$routes->get('/meest_clients/get_meest_clients_ajax', 'MeestSendersRecipients::get_meest_clients_ajax');
$routes->get('/meest_clients/get_meest_client_docs', 'MeestSendersRecipients::get_meest_client_docs');
$routes->get('/meest_clients/select2list', 'MeestSendersRecipients::select2list');

$routes->get('/meest_items', 'MeestItems::index');
$routes->get('/meest_items/(:num)', 'MeestItems::item/$1');
$routes->get('/meest_items/get_parcel_items_ajax', 'MeestItems::get_parcel_items_ajax');
$routes->get('/meest_items/get_meest_item_desc_ajax', 'MeestItems::get_meest_item_desc_ajax');
$routes->post('/meest_items/save', 'MeestItems::save');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
