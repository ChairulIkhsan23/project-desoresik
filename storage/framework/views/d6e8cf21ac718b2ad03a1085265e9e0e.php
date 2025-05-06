<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Akun Petugas</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f5f7fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding: 20px;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #6F906F; padding: 20px 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td align="right">
                                        <img src="<?php echo e($message->embed(storage_path('app/public/email-assets/logo-desoresik.png'))); ?>" alt="Logo Desoresik" style="height: 42px; margin-right: 10px; filter: brightness(0) invert(1);">
                                        <img src="<?php echo e($message->embed(storage_path('app/public/email-assets/logo-indramayu.png'))); ?>" alt="Logo Indramayu" style="height: 42px; margin-right: 10px; filter: brightness(0) invert(1);">
                                        <span style="background: white; border-radius: 50%; display: inline-flex; justify-content: center; align-items: center; width: 42px; height: 42px;">
                                            <img src="<?php echo e($message->embed(storage_path('app/public/email-assets/logo-klhk.png'))); ?>" alt="Logo KLHK" style="height: 42px; width: 42px; object-fit: contain;">
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 30px;">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                    <!-- Data -->
                                    <td valign="top" style="padding-right: 15px;">
                                        <h2 style="color: #1e293b; font-size: 24px; margin: 0 0 10px;">Halo, <?php echo e($petugas['name']); ?>!</h2>
                                        <p style="color: #64748b; font-size: 15px; margin: 0 0 20px;">Akun petugas Anda telah berhasil dibuat! Berikut informasi akun Anda:</p>
                                        <ul style="padding-left: 18px; color: #334155; font-size: 14px; margin: 0;">
                                            <li style="margin-bottom: 10px;"><strong>Email:</strong> <?php echo e($petugas['email']); ?></li>
                                            <li style="margin-bottom: 10px;"><strong>No HP:</strong> <?php echo e($petugas['no_hp']); ?></li>
                                            <li style="margin-bottom: 10px;"><strong>Role:</strong> <?php echo e($petugas['role']); ?></li>
                                            <li style="margin-bottom: 10px;"><strong>Status:</strong> <span style="color: #16a34a; font-weight: 500;"><?php echo e($petugas['status']); ?></span></li>
                                            <li style="margin-bottom: 10px;"><strong>Password:</strong> <code style="background: #f1f5f9; padding: 3px 6px; border-radius: 4px;"><?php echo e($password); ?></code></li>
                                        </ul>

                                        <div style="margin-top: 25px;">
                                            <a href="<?php echo e(url('/login')); ?>" style="background: #6F906F; color: #ffffff; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 500;">Login Sekarang</a>
                                        </div>
                                    </td>

                                    <!-- Foto -->
                                    <td valign="top" style="text-align: center;">
                                        <div style="background: #f1f5f9; padding: 10px; border-radius: 8px; display: inline-block;">
                                            <div style="width: 120px; height: 150px; border-radius: 4px; overflow: hidden; margin: 0 auto;">
                                                <?php if(!empty($petugas['foto']) && Storage::disk('public')->exists($petugas['foto'])): ?>
                                                    <img src="<?php echo e($message->embed(storage_path('app/public/' . $petugas['foto']))); ?>" 
                                                        alt="Foto Petugas" 
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                <?php else: ?>
                                                    <img src="<?php echo e($message->embed(storage_path('app/public/email-assets/profil-petugas.png'))); ?>" 
                                                        alt="Foto Default" 
                                                        style="width: 100%; height: 100%; object-fit: cover;">
                                                <?php endif; ?>
                                            </div>

                                            <div style="font-size: 12px; color: #1e293b; font-weight: bold; margin-top: 8px;">
                                                PETUGAS
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px 30px; font-size: 14px; color: #64748b;">
                            Terima kasih,<br><i><strong style="color: #1e293b;">DesoResik</strong></i>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH C:\laragon\www\project-desoresik\resources\views/emails/akun_petugas.blade.php ENDPATH**/ ?>