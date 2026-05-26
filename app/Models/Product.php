<?php

namespace App\Models;

use Core\Model;

class Product extends Model
{
    protected $table = 'products';

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)[0] ?? null;
    }

    public function getFeatured()
    {
        $sql = "SELECT * FROM {$this->table} WHERE is_featured = 1 LIMIT 6";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByCategory($categoryId, $page = 1, $perPage = 9)
    {
        $offset = ($page - 1) * $perPage;
        
        $countSql = "SELECT COUNT(*) as total FROM {$this->table} WHERE category_id = :id";
        $countStmt = $this->pdo->prepare($countSql);
        $countStmt->execute(['id' => $categoryId]);
        $total = $countStmt->fetch()['total'];

        $sql = "SELECT * FROM {$this->table} WHERE category_id = :id LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $categoryId);
        $stmt->bindValue(':limit', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return [
            'items' => $stmt->fetchAll(),
            'total' => $total,
            'pages' => ceil($total / $perPage),
            'current' => $page,
        ];
    }

    public function searchProducts($term, $page = 1, $perPage = 9)
    {
        $offset = ($page - 1) * $perPage;
        $search = '%' . $term . '%';
        
        $countSql = "SELECT COUNT(*) as total FROM {$this->table} WHERE name LIKE :term OR description LIKE :term";
        $countStmt = $this->pdo->prepare($countSql);
        $countStmt->execute(['term' => $search]);
        $total = $countStmt->fetch()['total'];

        $sql = "SELECT * FROM {$this->table} WHERE name LIKE :term OR description LIKE :term LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':term', $search);
        $stmt->bindValue(':limit', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();

        return [
            'items' => $stmt->fetchAll(),
            'total' => $total,
            'pages' => ceil($total / $perPage),
            'current' => $page,
        ];
    }
}
