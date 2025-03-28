

<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo e(session('success')); ?></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" onclick="this.parentElement.parentElement.remove()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </span>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline"><?php echo e(session('error')); ?></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" onclick="this.parentElement.parentElement.remove()" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
            </svg>
        </span>
    </div>
<?php endif; ?>

<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="<?php echo e(route('dashboard')); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 1-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="<?php echo e(route('employees.index')); ?>" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Employees</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?php echo e($employee->name); ?></span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <!-- Employee Profile Header -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Employee Information</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and information.</p>
            </div>
            <!-- Edit Mode Toggle -->
            <div>
                <button type="button" id="toggleEditMode" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg id="editIcon" class="h-5 w-5 mr-2 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <span id="editButtonText">Edit Information</span>
                </button>
            </div>
        </div>
        
        <!-- Employee Profile and Cursus Header -->
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6 text-center">
            <div class="flex flex-col items-center justify-center">
                <div class="h-24 w-24 bg-blue-100 rounded-full flex items-center justify-center text-blue-800 text-2xl font-bold mb-4">
                    <?php echo e(substr($employee->name, 0, 2)); ?>

                </div>
                <h2 class="text-xl font-bold view-mode"><?php echo e($employee->name); ?></h2>
                <p class="text-sm text-gray-500"><?php echo e($employee->email); ?></p>
                <p class="text-sm text-gray-700 mt-1 view-mode"><?php echo e($employee->job_title); ?></p>
                <div class="mt-2">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                        <?php echo e($employee->department ? $employee->department->name : 'No department assigned'); ?>

                    </span>
                </div>
            </div>
        </div>

        <!-- Career Path Timeline (Cursus) -->
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium text-gray-900 mb-5">Career Path</h3>
            
            <!-- Timeline Component -->
            <div class="relative">
                <?php if(count($careerSteps) > 0): ?>
                    <!-- Enhanced Timeline Component -->
                    <div class="relative career-timeline mb-10">
                        <!-- Timeline Line -->
                        <div class="absolute h-full w-1 bg-gradient-to-b from-blue-400 to-blue-600 left-0 top-0 transform translate-x-5"></div>
                        
                        <!-- Timeline Items -->
                        <div class="space-y-8">
                            <?php $__currentLoopData = $careerSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="relative pl-14">
                                    <!-- Timeline Point -->
                                    <div class="absolute left-0 top-0 transform translate-x-4">
                                        <div class="w-10 h-10 <?php echo e($step->is_current ? 'bg-green-500' : 'bg-blue-500'); ?> rounded-full flex items-center justify-center shadow-md">
                                            <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                                                <div class="w-6 h-6 <?php echo e($step->is_current ? 'bg-green-500' : 'bg-blue-500'); ?> rounded-full"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Timeline Content -->
                                    <div class="bg-white p-5 rounded-lg shadow-md border-l-4 <?php echo e($step->is_current ? 'border-green-500' : 'border-blue-500'); ?> hover:shadow-lg transition duration-300">
                                        <div class="flex justify-between items-start mb-2">
                                            <div>
                                                <h4 class="font-bold text-lg text-gray-800"><?php echo e($step->title); ?></h4>
                                                <p class="text-gray-600 text-sm"><?php echo e($step->step_date->format('F d, Y')); ?></p>
                                            </div>
                                            <div>
                                                <?php if($step->status): ?>
                                                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                                                        <?php echo e($step->status == 'Active' ? 'bg-green-100 text-green-800' : 
                                                           ($step->status == 'Certified' ? 'bg-blue-100 text-blue-800' :
                                                            ($step->status == 'Completed' ? 'bg-purple-100 text-purple-800' :
                                                             ($step->status == 'Pass' ? 'bg-indigo-100 text-indigo-800' :
                                                              'bg-gray-100 text-gray-800')))); ?>">
                                                        <?php echo e($step->status); ?>

                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="mt-3">
                                            <?php if($step->type): ?>
                                                <div class="text-sm"><span class="font-medium text-gray-700">Type:</span> <?php echo e($step->type); ?></div>
                                            <?php endif; ?>
                                            
                                            <?php if($step->details): ?>
                                                <div class="mt-2 text-sm text-gray-600"><?php echo e($step->details); ?></div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <!-- Admin actions -->
                                        <div class="mt-4 pt-3 border-t border-gray-100 flex space-x-4 justify-end">
                                            <button type="button" onclick="editStep(<?php echo e($step->id); ?>)" class="text-xs flex items-center text-blue-600 hover:text-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </button>
                                            <form action="<?php echo e(route('career-steps.destroy', $step->id)); ?>" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this step?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="text-xs flex items-center text-red-600 hover:text-red-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Current Contract Info Card -->
                <?php if($currentStep): ?>
                <div class="mt-8 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="font-medium text-gray-900">Current Position</h4>
                        <div class="flex items-center">
                            <span class="h-3 w-3 bg-green-500 rounded-full mr-2"></span>
                            <span class="text-sm text-gray-500"><?php echo e($currentStep->status); ?></span>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Type</p>
                            <p class="font-medium"><?php echo e($currentStep->type ?? 'N/A'); ?></p>
                        </div>
                        <div>
                            <p class=" text-sm text-gray-500">Location</p>
                            <p class="font-medium"><?php echo e($employee->location ?? 'N/A'); ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date</p>
                            <p class="font-medium"><?php echo e($currentStep->step_date->format('d M Y')); ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Department</p>
                            <p class="font-medium"><?php echo e($employee->department ? $employee->department->name : 'N/A'); ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Manager</p>
                            <p class="font-medium"><?php echo e($employee->manager ?? 'N/A'); ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Grade</p>
                            <p class="font-medium"><?php echo e($employee->grade ?? 'N/A'); ?></p>
                        </div>
                    </div>
                    
                    <!-- Absences & Delays Section -->
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Absences</p>
                            <p class="font-medium"><?php echo e($employee->absences ?? '-'); ?></p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Retards</p>
                            <p class="font-medium"><?php echo e($employee->delays ?? '-'); ?></p>
                        </div>
                    </div>
                    
                    <!-- Remarks Section -->
                    <div class="mt-6">
                        <p class="text-sm text-gray-500 mb-1">Remarques</p>
                        <p class="font-medium text-gray-700 italic"><?php echo e($currentStep->details ?? 'No remarks available'); ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Add New Career Step (Admin Only) -->
                <div class="mt-6 text-right view-mode">
                    <button type="button" onclick="showAddStepModal()" class="inline-flex items-center px-3 py-1.5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg> 
                        Add Career Step
                    </button>
                </div>
            </div>
        </div>

<!-- Add Edit Career Step Modal -->
<div id="editStepModal" class="fixed inset-0 overflow-y-auto hidden z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Edit Career Step</h3>
                        <div class="mt-4">
                            <form id="editStepForm" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="space-y-4">
                                    <div>
                                        <label for="edit_step_date" class="block text-sm font-medium text-gray-700">Date</label>
                                        <input type="date" name="step_date" id="edit_step_date" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="edit_step_title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="step_title" id="edit_step_title" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="edit_step_type" class="block text-sm font-medium text-gray-700">Type</label>
                                        <select name="step_type" id="edit_step_type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="">Select Type</option>
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Certification">Certification</option>
                                            <option value="Promotion">Promotion</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="edit_step_status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="step_status" id="edit_step_status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="Active">Active</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Certified">Certified</option>
                                            <option value="Pass">Pass</option>
                                            <option value="Fail">Fail</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="edit_step_details" class="block text-sm font-medium text-gray-700">Details</label>
                                        <textarea name="step_details" id="edit_step_details" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="edit_is_current" name="is_current" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="edit_is_current" class="font-medium text-gray-700">Mark as current position</label>
                                            <p class="text-gray-500">If checked, this will be shown as the employee's current position.</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="submit" form="editStepForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Update Step
                </button>
                <button type="button" onclick="hideEditStepModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

        









<!-- Employee Details Form -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <form id="employeeForm" action="<?php echo e(route('employees.update', $employee->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        
        <div class="border-t border-gray-200">
            <div class="grid grid-cols-2 md:grid-cols-2 gap-6 p-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Profile Section -->
                    <div class="edit-mode hidden">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <input type="text" id="name" name="name" value="<?php echo e($employee->name); ?>" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <!-- Department Information -->
                    <div>
                        <h3 class="text-md font-medium text-gray-700 mb-3">Department Information</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="mb-4 edit-mode hidden">
                                <label for="department_id" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                                <select id="department_id" name="department_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="">Select Department</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php echo e($employee->department_id == $department->id ? 'selected' : ''); ?>>
                                            <?php echo e($department->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Job Title</label>
                                <p class="text-gray-900 view-mode"><?php echo e($employee->job_title); ?></p>
                                <div class="edit-mode hidden">
                                    <input type="text" id="job_title" name="job_title" value="<?php echo e($employee->job_title); ?>" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Salary</label>
                                <p class="text-gray-900 view-mode">$<?php echo e(number_format($employee->salary, 2)); ?></p>
                                <div class="edit-mode hidden">
                                    <input type="number" id="salary" name="salary" value="<?php echo e($employee->salary); ?>" step="0.01" min="0" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Contact Information -->
                    <div>
                        <h3 class="text-md font-medium text-gray-700 mb-3">Contact Information</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <p class="text-gray-900 view-mode"><?php echo e($employee->email); ?></p>
                                <div class="edit-mode hidden">
                                    <input type="email" id="email" name="email" value="<?php echo e($employee->email); ?>" required class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <p class="text-gray-900 view-mode"><?php echo e($employee->phone ?? 'N/A'); ?></p>
                                <div class="edit-mode hidden">
                                    <input type="tel" id="phone" name="phone" value="<?php echo e($employee->phone); ?>" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Employment Information -->
                    <div>
                        <h3 class="text-md font-medium text-gray-700 mb-3">Employment Information</h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Employee since</label>
                                <p class="text-gray-900"><?php echo e($employee->created_at->format('M d, Y')); ?></p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Last updated</label>
                                <p class="text-gray-900"><?php echo e($employee->updated_at->format('M d, Y')); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-4 mt-8 edit-mode hidden">
                        <button type="button" onclick="cancelEdit()" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring -blue-500">
                            Cancel
                        </button>
                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Changes
                        </button>
                    </div>
                    
                    <!-- Delete Employee Button (View Mode Only) -->
                    <div class="mt-6 view-mode">
                        <button type="button" onclick="showDeleteModal()" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete Employee
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Add Career Step Modal -->
<div id="addStepModal" class="fixed inset-0 overflow-y-auto hidden z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Add Career Step</h3>
                        <div class="mt-4">
                            <form id="addStepForm" action="<?php echo e(route('employees.add-career-step', $employee->id)); ?>" method="POST" onsubmit="return validateStepDate()">
                                <?php echo csrf_field(); ?>
                                <div class="space-y-4">
                                    <div>
                                        <label for="step_date" class="block text-sm font-medium text-gray-700">Date</label>
                                        <input type="date" name="step_date" id="step_date" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="step_title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="step_title" id="step_title" required class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div>
                                        <label for="step_type" class="block text-sm font-medium text-gray-700">Type</label>
                                        <select name="step_type" id="step _type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="">Select Type</option>
                                            <option value="CDI">CDI</option>
                                            <option value="CDD">CDD</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Certification">Certification</option>
                                            <option value="Promotion">Promotion</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="step_status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="step_status" id="step_status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            <option value="Active">Active</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Certified">Certified</option>
                                            <option value="Pass">Pass</option>
                                            <option value="Fail">Fail</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="step_details" class="block text-sm font-medium text-gray-700">Details</label>
                                        <textarea name="step_details" id="step_details" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="is_current" name="is_current" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="is_current" class="font-medium text-gray-700">Mark as current position</label>
                                            <p class="text-gray-500">If checked, this will be shown as the employee's current position.</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="addStepForm" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Add Step
                    </button>
                    <button type="button" onclick="hideAddStepModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('toggleEditMode').addEventListener('click', function() {
        const viewElements = document.querySelectorAll('.view-mode');
        const editElements = document.querySelectorAll('.edit-mode');
        const editButtonText = document.getElementById('editButtonText');
        const editIcon = document.getElementById('editIcon');
        
        const isEditMode = editElements[0].classList.contains('hidden');
        
        if (isEditMode) {
            viewElements.forEach(el => el.classList.add('hidden'));
            editElements.forEach(el => el.classList.remove('hidden'));
            editButtonText.textContent = 'Cancel Editing';
            editIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
        } else {
            cancelEdit();
        }
    });
    
    function cancelEdit() {
        const viewElements = document.querySelectorAll('.view-mode');
        const editElements = document.querySelectorAll('.edit-mode');
        const editButtonText = document.getElementById('editButtonText');
        const editIcon = document.getElementById('editIcon');
        
        viewElements.forEach(el => el.classList.remove('hidden'));
        editElements.forEach(el => el.classList.add('hidden'));
        editButtonText.textContent = 'Edit Information';
        editIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />';
    }
    
    function showDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }
    
    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    
    function showAddStepModal() {
        document.getElementById('addStepModal').classList.remove('hidden');
    }
    
    function hideAddStepModal() {
        document.getElementById('addStepModal').classList.add('hidden');
    }
    
    window.addEventListener('click', function(event) {
        const deleteModal = document.getElementById('deleteModal');
        const addStepModal = document.getElementById('addStepModal');
        const editStepModal = document.getElementById('editStepModal');
        
        if (event.target === deleteModal) {
            hideDeleteModal();
        }
        
        if (event.target === addStepModal) {
            hideAddStepModal();
        }
        
        if (event.target === editStepModal) {
            hideEditStepModal();
        }
    });
    
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            hideDeleteModal();
            hideAddStepModal();
            hideEditStepModal();
        }
    });

    const careerStepsData = <?php echo json_encode($careerSteps, 15, 512) ?>;

    function editStep(stepId) {
        const step = careerStepsData.find(s => s.id === stepId);
        
        if (step) {
            document.getElementById('editStepForm').action = `/career-steps/${stepId}`;
            
            document.getElementById('edit_step_date').value = step.step_date.substring(0, 10); // Format as YYYY-MM-DD
            document.getElementById('edit_step_title').value = step.title;
            document.getElementById('edit_step_type').value = step.type || '';
            document.getElementById('edit_step_status').value = step.status;
            document.getElementById('edit_step_details').value = step.details || '';
            document.getElementById('edit_is_current').checked = step.is_current;
            
            document.getElementById('editStepModal').classList.remove('hidden');
        }
    }

    function hideEditStepModal() {
        document.getElementById('editStepModal').classList.add('hidden');
    }

    function validateStepDate() {
            const stepDateInput = document.getElementById('step_date');
            const stepDate = new Date(stepDateInput.value);
            const lastStepDate = new Date(careerStepsData[careerStepsData.length - 1].step_date);

            if (stepDate <= lastStepDate) {
                alert('The new step date must be after the last step date.');
                return false;
            }

            const sixMonthsLater = new Date(lastStepDate);
            sixMonthsLater.setMonth(lastStepDate.getMonth() + 6);
            if (stepDate < sixMonthsLater) {
                alert('The new step date must be at least 6 months after the last step date.');
                return false;
            }

            return true; 
        }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Youcode\Herd\hrsm\resources\views/employees/show.blade.php ENDPATH**/ ?>