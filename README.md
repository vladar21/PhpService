# PhpService

## Description

PhpService is an MVP web service designed to automate data preparation for importing goods. The web service interacts with two external APIs: BillAPI, which provides data on invoices for imported goods, and MeestAPI, which supplies information for shipping and customs documents related to imported goods.

PhpService allows users to retrieve and process data from BillAPI, subsequently transmitting it to MeestAPI. The project is built using the following software components, as specified in the composer.json file:

```json
{
    "name": "codeigniter4/appstarter",
    "type": "project",
    "description": "CodeIgniter4 starter app",
    "homepage": "https://codeigniter.com",
    "license": "MIT",
    "require": {
        "php": "^7.4",
        "ext-json": "*",
        "codeigniter4/framework": "4.3.7",
        "codeigniter4/shield": "^1.0@beta",
        "composer/composer": "^2.0"
    },
    ...
}
```
## Project documentations
Project docs available by [link](https://vladar21.github.io/PhpServiceDocs/)

## User Goals

The primary goals for users of this website are:

1. **Retrieve Invoices**: Users can fetch invoices from BillAPI and work with them in the "Bills" section, which includes sub-sections for "Invoices," "Products," and "Clients."

2. **Manage Parcels**: Users can create parcels associated with specific invoices and continue working with them in the "Meest" section, comprising sub-sections for "Parcels," "Items" (products), and "Clients."

3. **Send Parcel Data**: Within a parcel, users can submit completed data to MeestAPI. MeestAPI responds by confirming successful data receipt or providing a list of fields with errors.

## Features

- **Data Import**: PhpService seamlessly imports data from BillAPI and prepares it for further processing. Users can view invoices, products, and client details in a user-friendly interface.

- **Parcel Management**: Users can create and manage parcels associated with invoices. The system ensures the smooth flow of data from BillAPI to MeestAPI.

- **Error Handling**: The application includes robust error handling mechanisms. Users receive clear notifications in case of issues with data submission or other processes.

- **Logging**: PhpService includes comprehensive logging capabilities. It logs requests to and responses from external APIs, as well as errors and exceptions occurring during application operation. Logging is managed using [log library name, e.g., Monolog], which writes data to log files. Configuration settings for the logger can be adjusted in the [configuration file name, e.g., log_config.php]. To view logs, navigate to the logs directory in the project's root directory and open the corresponding log file.

- **Extensibility**: PhpService is designed for extensibility. Future enhancements can include connecting a third external API, SalesAPI, to update sales statistics. Additionally, the service aims to provide users with their own API (PhpServiceAPI) for real-time order status updates and forwarding external API error messages.

## Technologies Used

PhpService is built using the following technologies:

- **CodeIgniter 4**: The core framework that powers PhpService.

- **CodeIgniter Shield**: A security extension for CodeIgniter that enhances protection against common web vulnerabilities.

- **DataTables**: A powerful jQuery plugin for interactive data tables in the application's frontend.

- **Select2**: A jQuery-based replacement for select boxes, enhancing the user experience when selecting items.

## Installation and Usage

[Provide installation and usage instructions here, including any specific configuration steps, if needed.]

## Future Enhancements

Here are some future enhancements planned for PhpService:

1. **Integration with SalesAPI**: Connect the SalesAPI to update sales statistics automatically. This enhancement will provide users with valuable insights into their sales data.

2. **PhpServiceAPI for Users**: Develop a dedicated API, PhpServiceAPI, for users to check the current status of their orders and receive error messages from external APIs in real-time.

## Testing

[Include instructions for running tests if applicable.]

## Deployment

[Provide guidance on how to deploy PhpService to a production environment.]

## Credits

[Give credit to individuals or organizations that contributed to the project.]

## License

[Specify the project's license, e.g., MIT License, Apache License, etc.]

---

This README file is a concise guide to the PhpService project, providing an overview of its features, installation instructions, future plans, and more.
