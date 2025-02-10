<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO date_plans (selected_date, activities, restaurant, created_at) VALUES (?, ?, ?, NOW())");
        
        $stmt->execute([
            $data['date'],
            json_encode($data['activities']),
            $data['restaurant']
        ]);
        
        echo json_encode(['success' => true, 'message' => 'Date plan saved successfully!']);
    } catch(PDOException $e) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Error saving date plan: ' . $e->getMessage()]);
    }
}
?> 