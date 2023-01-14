# Magento 2 Shopfinder Module - Create Admin Grid With CURD Operations, Graphql to update shop data by id, view all the shops, view shop by id

This module can be installed in two ways as listed below:

## Composer Installation

Specify the version of the module you need, and go.

    composer config

## Manual Installation

The module can be installed manually as well by git cloning the repository to directory /app/code/

->Repo link: https://github.com/Firas220890/Shopfinder-Module.git

->Once the installation is done by following one of the above method run the below command to compile the Module

* sh deploy.sh

Once the module is successfully installed you can very the below:

->In database you can find a custom table named "shops_data"
->A section in Magento admin panel under Content->Elements named "Shopfinder" will be added
->Once you select the Shopfinder you can see a grid view where all the shops will be listed and buttons to add a new shop, edit for existing shops.

#GraphQL Explanation:

Graphql for this module is developed to perform below operations:

a) Update shop information by passing the unique identifier which is shop id
b) Display all the shop within the system
c) Display information for specific shop by passing the shop id

->Graphql mutation is developed to update existing shops data by passing the unique identifier which is the entity_id
 * Graphql usage:

   mutation {
    shopData(input: {
      shop_id: "string",
      shop_name: "string",
      country_code: "ISO Two digit country code",
      base64_encoded_file: "string"
      }) {
     message
     success
    }
  }

->Graphql query is developed to display all the shops existing in the system.
* GraphQL Usage:

  {
    getShopsList {
      country
      entity_id
      image
      title
    }
  }

->GraphQL query is developed to display the shop by passing the unique identifier which is entity_id
* GraphQL usage:

  {
    view_shop_by_id(shop_id: int) {
      country
      entity_id
      image
      title
    }
  }
