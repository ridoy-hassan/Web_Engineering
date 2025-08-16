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

<h1>PHP View App</h1>

<form method="POST">
    <label>Name</label>
    <input type="text" name="name" required>

    <label>Date of Birth</label>
    <input type="date" name="dob" required>

    <label>Gender</label>
    <select name="gender" required>
        <option value="">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label>Email</label>
    <input type="email" name="email" required pattern=".+@(diu\.edu\.bd|edu\.bd)">

    <label>Phone</label>
    <input type="text" name="phone" required>

    <label>Address</label>
    <textarea name="address" required></textarea>

    <button type="submit" name="submit">Add User</button>
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
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="7" style="text-align:center;">No Users Found</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>

</body>
</html>
