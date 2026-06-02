<?php $__env->startSection('content'); ?>
<div class="bbn-list-container">
    <div class="list-header">
        <a href="<?php echo e(route('dashboard')); ?>" class="btn-back">
            <i class="fas fa-arrow-left"></i> Volver al Dashboard
        </a>
        <h1>Alumnos</h1>
        <a href="<?php echo e(route('alumnos.create')); ?>" class="btn-new">
            <i class="fas fa-plus"></i> Nuevo alumno
        </a>
    </div>

    <div class="table-responsive">
        <table class="bbn-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td data-label="ID"><?php echo e($alumno->id_alumno); ?></td>
                    <td data-label="Nombre"><?php echo e($alumno->nombre); ?></td>
                    <td data-label="Apellido"><?php echo e($alumno->apellido); ?></td>
                    <td data-label="Email"><?php echo e($alumno->email); ?></td>
                    <td data-label="Teléfono"><?php echo e($alumno->telefono ?? '—'); ?></td>
                    <td class="actions">
                        <a href="<?php echo e(route('alumnos.show', $alumno->id_alumno)); ?>" class="btn-icon" title="Ver">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?php echo e(route('alumnos.edit', $alumno->id_alumno)); ?>" class="btn-icon" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?php echo e(route('alumnos.destroy', $alumno->id_alumno)); ?>" method="POST" class="delete-form" onsubmit="return confirm('¿Eliminar este alumno?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-icon" title="Eliminar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="empty-row">No hay alumnos registrados. ¡Crea tu primer alumno!</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination-wrapper">
        <?php echo e($alumnos->links()); ?>

    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Inter:wght@400;500;600;700&display=swap');

    .bbn-list-container {
        padding: 2rem;
        background: linear-gradient(145deg, #0a0a0f 0%, #1a1a2e 100%);
        min-height: 100vh;
        font-family: 'Inter', sans-serif;
    }

    .list-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .list-header h1 {
        font-family: 'Space Mono', monospace;
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #fff, #a78bfa);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        margin: 0;
    }

    .btn-back, .btn-new {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 20px;
        border-radius: 40px;
        font-family: 'Space Mono', monospace;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-back {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(168,85,247,0.3);
        color: #a78bfa;
    }

    .btn-back:hover {
        background: rgba(168,85,247,0.15);
        color: #fff;
        transform: translateY(-2px);
    }

    .btn-new {
        background: #7c3aed;
        color: white;
        border: none;
        box-shadow: 0 2px 8px rgba(124,58,237,0.3);
    }

    .btn-new:hover {
        background: #6d28d9;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(124,58,237,0.4);
    }

    .table-responsive {
        overflow-x: auto;
        border-radius: 24px;
        background: rgba(20, 20, 35, 0.6);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.08);
    }

    .bbn-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
        color: #e2e8f0;
    }

    .bbn-table th {
        text-align: left;
        padding: 16px 20px;
        background: rgba(0,0,0,0.3);
        font-family: 'Space Mono', monospace;
        font-weight: 600;
        color: #c4b5fd;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }

    .bbn-table td {
        padding: 14px 20px;
        border-bottom: 1px solid rgba(255,255,255,0.05);
        vertical-align: middle;
    }

    .bbn-table tr:hover td {
        background: rgba(255,255,255,0.03);
    }

    .empty-row {
        text-align: center;
        color: #94a3b8;
        padding: 40px !important;
    }

    .actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 34px;
        height: 34px;
        border-radius: 10px;
        background: rgba(255,255,255,0.08);
        color: #cbd5e1;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-icon:hover {
        background: rgba(255,255,255,0.18);
        color: white;
        transform: translateY(-2px);
    }

    .delete-form {
        display: inline;
    }

    .pagination-wrapper {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination-wrapper .pagination {
        gap: 6px;
    }

    .pagination-wrapper .page-item .page-link {
        background: rgba(20,20,35,0.8);
        border: 1px solid rgba(255,255,255,0.1);
        color: #e2e8f0;
        border-radius: 12px;
        padding: 8px 14px;
        font-family: 'Space Mono', monospace;
        transition: all 0.2s;
    }

    .pagination-wrapper .page-item.active .page-link {
        background: #7c3aed;
        border-color: #7c3aed;
        color: white;
    }

    .pagination-wrapper .page-link:hover {
        background: rgba(124,58,237,0.5);
        color: white;
        transform: translateY(-1px);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .bbn-list-container {
            padding: 1rem;
        }
        .list-header {
            flex-direction: column;
            align-items: stretch;
            text-align: center;
        }
        .btn-back, .btn-new {
            justify-content: center;
        }
        .bbn-table th, .bbn-table td {
            padding: 10px 12px;
            font-size: 0.8rem;
        }
        .btn-icon {
            width: 28px;
            height: 28px;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\appLoginMatricula\resources\views/alumnos/index.blade.php ENDPATH**/ ?>