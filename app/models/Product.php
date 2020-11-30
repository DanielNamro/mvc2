<?php
namespace App\Models;

use PDO;
use PDOException;

class Product
{
    public function __construct()
    {
        # code...
    }

    public static function all()
    {
        $db = Product::db();
        $statement = $db->query('SELECT * FROM products');
        $products = $statement->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;        
    }

    public static function find($id)
    {
        $db = Product::db();

        $statement = $db->prepare('SELECT * FROM products WHERE id=:id');
        $statement->execute(array(':id' => $id));        
        $statement->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $producttype = $statement->fetch(PDO::FETCH_CLASS);
        return $producttype;
    }
    public function type()
{
    //un producto pertenece a un tipo:
    $db = Product::db();
    $statement = $db->prepare('SELECT * FROM product_types WHERE id = :id');
    $statement->bindValue(':id', $this->type_id);
    $statement->execute();

    $statement->setFetchMode(PDO::FETCH_CLASS, ProductType::class);
    $product_type = $statement->fetch(PDO::FETCH_CLASS);

    return $product_type;
}

public function __get($atributoDesconocido)
{
    // return "atributo $atributoDesconocido desconocido";
    if (method_exists($this, $atributoDesconocido)) {
        $this->$atributoDesconocido = $this->$atributoDesconocido();
        return $this->$atributoDesconocido;
        // echo "<hr> atributo $x <hr>";
    }
}

    public function insert()
    {
        $db = Product::db();

        $statement = $db->prepare('INSERT INTO products(`name`, `type_id`, `price`) VALUES(:name, :type_id, :price)');
        $data = [
            ':name' => $this->name,
            ':type_id' => $this->type_id,
            ':price' => $this->price
        ];
        return $statement->execute($data);
    }

    protected static function db()
    {
        $dsn = 'mysql:dbname=mvc;host=db';
        $usuario = 'root';
        $contraseña = 'password';
        try {
            $db = new PDO($dsn, $usuario, $contraseña);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
        return $db;
    }
}
