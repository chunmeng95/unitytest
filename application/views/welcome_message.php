<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Phonebook System</title>
  <!-- Bootstrap styling -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <h1>Phonebook System</h1>
  
  <?php if (isset($message)) { ?>
  <div class="alert alert-success">
    <?php echo $message; ?>
  </div>
  <?php } ?>
  
  
  <h2><?php echo (isset($edit_entry) && $edit_entry) ? 'Edit Entry' : 'Add New Entry'; ?></h2>
  <form method="post" action="">
    
    <input type="hidden" name="id" value="<?php echo isset($edit_entry->id) ? $edit_entry->id : ''; ?>">
    
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" class="form-control" value="<?php echo isset($edit_entry->name) ? $edit_entry->name : ''; ?>" required>
    </div>
    
    <div class="form-group">
      <label for="phone">Phone No</label>
      <input type="text" name="phone" class="form-control" value="<?php echo isset($edit_entry->phone) ? $edit_entry->phone : ''; ?>" required>
    </div>
    
    <div class="form-group">
      <label for="status">Status</label>
      <input type="text" name="status" class="form-control" value="<?php echo isset($edit_entry->status) ? $edit_entry->status : ''; ?>" required>
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">
      <?php echo (isset($edit_entry) && $edit_entry) ? 'Update' : 'Submit'; ?>
    </button>
  </form>
  
  
  <h2>Phonebook List</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone No</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($phonebook)) {
          foreach ($phonebook as $entry) { ?>
      <tr>
        <td><?php echo $entry->id; ?></td>
        <td><?php echo $entry->name; ?></td>
        <td><?php echo $entry->phone; ?></td>
        <td><?php echo $entry->status; ?></td>
        <td>
          
          <a href="<?php echo site_url('/?edit=' . $entry->id); ?>" class="btn btn-warning btn-sm">Edit</a>
          
          <a href="<?php echo site_url('welcome/delete/' . $entry->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirm?');">Delete</a>
        </td>
      </tr>
      <?php } 
      } else { ?>
      <tr>
        <td colspan="5">No entries found.</td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>
