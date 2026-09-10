<?php
include 'includes/db.php';

// Add slug column if it doesn't exist
$sql = "SHOW COLUMNS FROM blogs LIKE 'slug'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    // Add column
    $sql = "ALTER TABLE blogs ADD COLUMN slug VARCHAR(255) UNIQUE AFTER title";
    if ($conn->query($sql) === TRUE) {
        echo "Slug column added successfully.\n";
    } else {
        echo "Error adding slug column: " . $conn->error . "\n";
    }
} else {
    echo "Slug column already exists.\n";
}

// Backfill slugs for existing posts
$result = $conn->query("SELECT id, title FROM blogs WHERE slug IS NULL OR slug = ''");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        
        // Simple slug generation
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        
        // Ensure uniqueness (simple check, for full robustness need loop)
        $check = $conn->query("SELECT id FROM blogs WHERE slug = '$slug' AND id != $id");
        if ($check->num_rows > 0) {
            $slug .= '-' . $id;
        }

        $stmt = $conn->prepare("UPDATE blogs SET slug = ? WHERE id = ?");
        $stmt->bind_param("si", $slug, $id);
        $stmt->execute();
        echo "Updated slug for ID $id: $slug\n";
    }
} else {
    echo "No blogs need backfilling.\n";
}
?>
