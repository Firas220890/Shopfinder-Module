**# Module name: Shopfinder - Magento 2**

Author: Firas

About Module:
The main functionality of the module is to enable business to create shops within the content management system with ability to edit, deleted, filter, etc.
This module also comes with API built using Graphql where a user can update the shop data by using it's unique identifier which is the shop id, view all the shops available in the system, view a specific shop by using it's unique identifier.

Implementation:
A custom module have been developed to acheive the same where a menu named "Shopfinder" is added under Content->Elements section of the admin panel.
Graphql mutation and query are used to update and fetch the shop information accordingly.

**Let's get started!**

**Steps to install the module:**
There are two ways to install this module which are listed below:

## Composer Installation - recommended way

Run the below composer require command to install the package

`composer require firas/shopfinder`

You can also find the package information here https://packagist.org/packages/firas/shopfinder

**Note:** You may encounter below error when you run the above **composer require firas/shopfinder** to fix the error please run below commands.
**Error message: Could not find a version of package firas/shopfinder matching your minimum-stability (stable). Require it with an explicit version constraint allowing its   
desired stability.**

`composer config minimum-stability dev`
`composer config prefer-stable true`

Once above composer settings are done, run `composer require firas/shopfinder` again. Now you can see that the package will be installed successfully in vendor folder of the magento directory.

Check the status of the module just installed by running `bin/magento module:status`, if the module Firas_Shopfinder is disabled kindly enable it by running `bin/magento module:enable Firas_Shopfinder`

Run `sh deploy.sh` from the terminal

You can now start exploring the module by logging into the Admin panel.

## Manual Installation

The module can be installed manually as well by git cloning the repository to directory /app/code/

**Repo link:** `https://github.com/Firas220890/Shopfinder-Module.git`

Once the installation of the module is done by following one of the above methods, run the below command to compile the Module from the magento root directory.

`sh deploy.sh`

## After installation

Once the package installation is completed by following one of the above listed methods you may note the below points and verify the package.

->In database you can find a custom table named **"shops_data"**
Reference image: https://ibb.co/wQD3bLb

->A section in Magento admin panel under Content->Elements named **"Shopfinder"**
Reference image: https://ibb.co/y8j0mP8

->Once you select the **Shopfinder** you can see a grid view where all the shops will be listed and buttons to **add a new shop**, **edit/delete existing shops**.
https://ibb.co/Kyts6ny

#GraphQL Explanation:

As described earlier Graphql for this module is developed to perform below operations:

a) Update shop information by passing the unique identifier which is shop id
b) Display all the available shops within the system
c) Display information for specific shop by passing the shop id

**GrapghQL Endpoint:** http://magento2.local/graphql 

->Graphql mutation is developed to update existing shops data by passing the unique identifier which is the entity_id
**Graphql usage:**

  ` mutation {
    shopData(input: {
      shop_id: "string",
      shop_name: "string",
      country_code: "ISO Two digit country code",
      base64_encoded_file: "string"
      }) {
     message
     success
    }
  }`

->Graphql query is developed to display all the shops existing in the system. 
**GraphQL Usage:**

  `{
    getShopsList {
      country
      entity_id
      image
      title
    }
  }`

->GraphQL query is developed to display the shop by passing the unique identifier which is entity_id
**GraphQL usage:**

  `{
    view_shop_by_id(shop_id: int) {
      country
      entity_id
      image
      title
    }
  }`

That is it! I hope you guys had fun installing this module and executing it. I am always open to feedback and learning. Any feedback will be highly appreciated :)

Thank you,
Firas,
Senior Magento Full-Stack Developer.
