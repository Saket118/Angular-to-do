<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <!-- ✅ Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg rounded-3">
          <div class="card-header bg-primary text-white text-center">
            <h4>Register</h4>
          </div>
          <div class="card-body">
            <form action="<?= base_url('register/save') ?>" method="post" enctype="multipart/form-data">
              
              <!-- Name -->
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>" 
                       name="name" value="<?= set_value('name') ?>">
                <?php if(isset($validation) && $validation->hasError('name')): ?>
                  <div class="invalid-feedback">
                    <?= $validation->getError('name') ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" 
                       name="email" value="<?= set_value('email') ?>">
                <?php if(isset($validation) && $validation->hasError('email')): ?>
                  <div class="invalid-feedback">
                    <?= $validation->getError('email') ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Phone -->
              <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control <?= isset($validation) && $validation->hasError('phone') ? 'is-invalid' : '' ?>" 
                       name="phone" value="<?= set_value('phone') ?>">
                <?php if(isset($validation) && $validation->hasError('phone')): ?>
                  <div class="invalid-feedback">
                    <?= $validation->getError('phone') ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Country -->
              <div class="mb-3">
                <label class="form-label">Country</label>
                <select class="form-select <?= isset($validation) && $validation->hasError('country') ? 'is-invalid' : '' ?>" name="country">
                  <option value="" disabled <?= set_value('country') == '' ? 'selected' : '' ?>>-- Select Country --</option>
                  <option value="India" <?= set_value('country') == 'India' ? 'selected' : '' ?>>India</option>
                  <option value="USA" <?= set_value('country') == 'USA' ? 'selected' : '' ?>>USA</option>
                  <option value="UK" <?= set_value('country') == 'UK' ? 'selected' : '' ?>>UK</option>
                  <option value="Canada" <?= set_value('country') == 'Canada' ? 'selected' : '' ?>>Canada</option>
                  <option value="Australia" <?= set_value('country') == 'Australia' ? 'selected' : '' ?>>Australia</option>
                </select>
                <?php if(isset($validation) && $validation->hasError('country')): ?>
                  <div class="invalid-feedback">
                    <?= $validation->getError('country') ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- City -->
              <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('city') ? 'is-invalid' : '' ?>" 
                       name="city" value="<?= set_value('city') ?>">
                <?php if(isset($validation) && $validation->hasError('city')): ?>
                  <div class="invalid-feedback">
                    <?= $validation->getError('city') ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Image -->
              <div class="mb-3">
                <label class="form-label">Upload Image</label>
                <input type="file" class="form-control <?= isset($validation) && $validation->hasError('image') ? 'is-invalid' : '' ?>" 
                       name="image" accept="image/*">
                <?php if(isset($validation) && $validation->hasError('image')): ?>
                  <div class="invalid-feedback">
                    <?= $validation->getError('image') ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Submit -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ✅ Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
