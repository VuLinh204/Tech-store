<?php
class ValidateData
{
    public function validateProductName($name)
    {
        if (empty($name))
            return ["Tên sản phẩm không được để trống."];
        if (strlen($name) < 3)
            return ["Tên sản phẩm phải có ít nhất 3 ký tự."];
        if (strlen($name) > 100)
            return ["Tên sản phẩm không vượt quá 100 ký tự."];
        if (!preg_match('/^[a-zA-Z0-9\s]+$/u', $name))
            return ["Tên sản phẩm chứa ký tự không hợp lệ."];
        return [];
    }
}
