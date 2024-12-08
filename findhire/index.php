<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

$searchInput = isset($_GET['searchInput']) ? $_GET['searchInput'] : '';
$jobPosts = getAllJobPosts($pdo, $searchInput);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Hire</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<div class="main-content">
        
    <?php 
    include "searchbar.php"; 
    ?>

    <div class="jobDetails"> 
        <h1>Vacant positions</h1> 
        <?php if (!empty($jobPosts)) { ?>
            <?php foreach ($jobPosts as $post) { ?> 
                <div class="jobPostContainer"> 
                    <div class="jobPost" style="margin-bottom: 20px; padding: 15px; display: center;" >
                        <h3><?php echo htmlspecialchars($post['job_title']); ?></h3> 
                        <p><?php echo htmlspecialchars($post['job_description']); ?></p> 
                        <p>Posted by: <?php echo htmlspecialchars($post['hr_username']); ?></p> 
                        <form action="login.php" method="get"> 
                        <input type="hidden" name="job_id" value="<?php echo $post['job_id']; ?>"> 
                        <button type="submit" class="applyButton">Apply</button> 
                        </form>
                    </div> 
                </div> 
            <?php } ?> 
        <?php } else { ?>
            <p>No job posts found matching your search criteria.</p>
        <?php } ?>
    </div>
</div>
</body>
</html>
