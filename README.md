# Snowflake Module for Magento 2

[![Latest Stable Version](https://img.shields.io/packagist/v/opengento/module-snowflake.svg?style=flat-square)](https://packagist.org/packages/opengento/module-snowflake)
[![License: MIT](https://img.shields.io/github/license/opengento/magento2-snowflake.svg?style=flat-square)](./LICENSE)
[![Packagist](https://img.shields.io/packagist/dt/opengento/module-snowflake.svg?style=flat-square)](https://packagist.org/packages/opengento/module-snowflake/stats)
[![Packagist](https://img.shields.io/packagist/dm/opengento/module-snowflake.svg?style=flat-square)](https://packagist.org/packages/opengento/module-snowflake/stats)

This module adds ❄️️ based on local meteo.

- [Setup](#setup)
    - [Composer installation](#composer-installation)
    - [Setup the module](#setup-the-snowflake)
- [Features](#features)
- [Settings](#settings)
- [Documentation](#documentation)
- [Support](#support)
- [Authors](#authors)
- [License](#license)

## Setup

Magento 2 Open Source or Commerce edition is required.

###  Composer installation

Run the following composer command:

```
composer require opengento/module-snowflake
```

### Setup the module

Run the following magento command:

```
bin/magento setup:upgrade
```

**If you are in production mode, do not forget to recompile and redeploy the static resources.**

## Features

### Country to store mapping

Define many countries to many stores relation. This configuration will allows Magento to map stores with countries.

## Settings

The configuration for this module is available in `Stores > Configuration > General > Snowflake`.

## Documentation

Enable the module in the configuration panel to enable the snowflake based on the local meteo.

## Support

Raise a new [request](https://github.com/opengento/magento2-snowflake/issues) to the issue tracker.

## Authors

- **Opengento Community** - *Lead* - [![Twitter Follow](https://img.shields.io/twitter/follow/opengento.svg?style=social)](https://twitter.com/opengento)
- **Contributors** - *Contributor* - [![GitHub contributors](https://img.shields.io/github/contributors/opengento/magento2-snowflake.svg?style=flat-square)](https://github.com/opengento/magento2-snowflake/graphs/contributors)

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) details.

***That's all folks!***
