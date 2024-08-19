<?php

namespace App\Console\Constants\ProductResponseEnum;

enum ProductResponseEnum: string
{
    case  PRODUCT_LIST = 'Product list';
    case PRODUCT_CREATE = 'Product created';
    case ERROR = "Something went wrong, check Logs!";
}
