<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>PHP CRUD App</h1>

<form method="POST">
    <input type="hidden" name="id" value="<?= isset($edit_user['id']) ? htmlspecialchars($edit_user['id']) : '' ?>">
    
    <label>Name</label>
    <input type="text" name="name" required 
           value="<?= isset($edit_user['name']) ? htmlspecialchars($edit_user['name']) : '' ?>">

    <label>Date of Birth</label>
    <input type="date" name="dob" required 
           value="<?= isset($edit_user['dob']) ? htmlspecialchars($edit_user['dob']) : '' ?>">

    <label>Gender</label>
    <select name="gender" required>
        <option value="">Select Gender</option>
        <option value="Male" <?= (isset($edit_user['gender']) && $edit_user['gender'] == 'Male') ? 'selected' : '' ?>>Male</option>
        <option value="Female" <?= (isset($edit_user['gender']) && $edit_user['gender'] == 'Female') ? 'selected' : '' ?>>Female</option>
        <option value="Other" <?= (isset($edit_user['gender']) && $edit_user['gender'] == 'Other') ? 'selected' : '' ?>>Other</option>
    </select>

    <label>Email</label>
    <input type="email" name="email" required pattern=".+@(diu\.edu\.bd|edu\.bd)"
           value="<?= isset($edit_user['email']) ? htmlspecialchars($edit_user['email']) : '' ?>">

    <label>Phone</label>
    <input type="text" name="phone" required 
           value="<?= isset($edit_user['phone']) ? htmlspecialchars($edit_user['phone']) : '' ?>">

    <label>Address</label>
    <textarea name="address" required><?= isset($edit_user['address']) ? htmlspecialchars($edit_user['address']) : '' ?></textarea>

    <button type="submit" name="submit"><?= isset($edit_user) ? 'Update' : 'Add' ?> User</button>
</form>

<h2>Users List</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($users && $users->num_rows > 0): ?>
        <?php while ($row = $users->fetch_assoc()): ?>
            <tr>
                <td data-label="ID"><?= htmlspecialchars($row['id']) ?></td>
                <td data-label="Name"><?= htmlspecialchars($row['name']) ?></td>
                <td data-label="DOB"><?= htmlspecialchars($row['dob']) ?></td>
                <td data-label="Gender"><?= htmlspecialchars($row['gender']) ?></td>
                <td data-label="Email"><?= htmlspecialchars($row['email']) ?></td>
                <td data-label="Phone"><?= htmlspecialchars($row['phone']) ?></td>
                <td data-label="Address"><?= htmlspecialchars($row['address']) ?></td>
                <td class="actions" data-label="Actions">
                    <a href="index.php?edit=<?= $row['id'] ?>">Edit</a>
                    <a href="index.php?delete=<?= $row['id'] ?>" class="delete" 
                       onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="8" style="text-align:center;">No Users Found</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>