<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Calculator</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen p-4 md:p-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <header class="mb-10 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">
                <i class="fas fa-shapes text-blue-500 mr-3"></i>Shape Calculator
            </h1>
            <p class="text-gray-600 text-lg">Calculate area and get information about rectangles and circles</p>
        </header>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Form Section -->
            <div class="lg:w-2/5">
                <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-3 border-b border-gray-200">
                        <i class="fas fa-ruler-combined text-blue-500 mr-2"></i>Enter Dimensions
                    </h2>
                    
                    <form method="GET" class="space-y-6">
                        <div class="space-y-4">
                            <!-- Rectangle Inputs -->
                            <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                                <h3 class="font-semibold text-blue-800 mb-3 flex items-center">
                                    <i class="fas fa-rectangle-land mr-2"></i>Rectangle Dimensions
                                </h3>
                                
                                <div class="space-y-4">
                                    <div>
                                        <label for="length" class="block text-sm font-medium text-gray-700 mb-1">Length</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-ruler-vertical text-gray-400"></i>
                                            </div>
                                            <input type="number" id="length" name="length" step="0.01" min="0.01" placeholder="Enter length" required
                                                   class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label for="width" class="block text-sm font-medium text-gray-700 mb-1">Width</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-ruler-horizontal text-gray-400"></i>
                                            </div>
                                            <input type="number" id="width" name="width" step="0.01" min="0.01" placeholder="Enter width" required
                                                   class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Circle Inputs -->
                            <div class="bg-purple-50 p-4 rounded-xl border border-purple-100">
                                <h3 class="font-semibold text-purple-800 mb-3 flex items-center">
                                    <i class="fas fa-circle mr-2"></i>Circle Dimension
                                </h3>
                                
                                <div>
                                    <label for="radios" class="block text-sm font-medium text-gray-700 mb-1">Radius</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-dot-circle text-gray-400"></i>
                                        </div>
                                        <input type="number" id="radios" name="radios" step="0.01" min="0.01" placeholder="Enter radius" required
                                               class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="pt-2">
                            <button type="submit" name="submit" 
                                    class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white font-bold py-4 px-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center">
                                <i class="fas fa-calculator mr-3"></i> Calculate Shapes
                            </button>
                        </div>
                    </form>
                    
                    <!-- Info Box -->
                    <div class="mt-8 p-4 bg-gray-50 rounded-xl border border-gray-200">
                        <h4 class="font-semibold text-gray-700 mb-2 flex items-center">
                            <i class="fas fa-info-circle text-blue-500 mr-2"></i>How to use
                        </h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Enter positive values for rectangle length and width</li>
                            <li>• Enter a positive value for circle radius</li>
                            <li>• Click "Calculate Shapes" to see results</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Results Section -->
            <div class="lg:w-3/5">
                <?php
                require_once "Rectangle.php";
                require_once "Circle.php";

                if (isset($_GET['submit'])) {
                    $length = isset($_GET['length']) ? floatval($_GET['length']) : 0;
                    $width  = isset($_GET['width']) ? floatval($_GET['width']) : 0;
                    $radios  = isset($_GET['radios']) ? floatval($_GET['radios']) : 0;

                    if ($length > 0 && $width > 0 && $radios > 0) {
                        $r = new Rectangle($length, $width);
                        $r->setName("My Rectangle");

                        $c = new Circle($radios);
                        $c->setName("My Circle");
                        ?>
                        
                        <div class="space-y-8">
                            <!-- Rectangle Results -->
                            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border-l-4 border-blue-500">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                                        <i class="fas fa-rectangle-land text-blue-500 mr-3 text-3xl"></i>
                                        Rectangle Results
                                    </h2>
                                    <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-2 rounded-full">
                                        <i class="fas fa-ruler-combined mr-1"></i> Dimensions: <?php echo $length; ?> × <?php echo $width; ?>
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div class="bg-blue-50 p-5 rounded-xl">
                                        <h4 class="font-semibold text-blue-700 mb-2 flex items-center">
                                            <i class="fas fa-info-circle mr-2"></i> Shape Information
                                        </h4>
                                        <p class="text-gray-700"><?php echo $r->getFullDescription(); ?></p>
                                    </div>
                                    
                                    <div class="bg-green-50 p-5 rounded-xl">
                                        <h4 class="font-semibold text-green-700 mb-2 flex items-center">
                                            <i class="fas fa-calculator mr-2"></i> Area Calculation
                                        </h4>
                                        <div class="text-3xl font-bold text-green-800 mt-2">
                                            <?php echo $r->area(); ?>
                                            <span class="text-lg font-normal text-gray-600">units²</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">Area = Length × Width</p>
                                    </div>
                                </div>
                                
                                <div class="flex justify-center mt-4">
                                    <div class="relative w-48 h-32 border-4 border-blue-400 rounded-lg bg-gradient-to-r from-blue-100 to-blue-200 flex items-center justify-center">
                                        <span class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-sm font-semibold text-blue-800">
                                            L = <?php echo $length; ?>
                                        </span>
                                        <span class="absolute -right-8 top-1/2 transform -translate-y-1/2 text-sm font-semibold text-blue-800">
                                            W = <?php echo $width; ?>
                                        </span>
                                        <i class="fas fa-rectangle-land text-blue-500 text-4xl opacity-50"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Circle Results -->
                            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 border-l-4 border-purple-500">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                                        <i class="fas fa-circle text-purple-500 mr-3 text-3xl"></i>
                                        Circle Results
                                    </h2>
                                    <span class="bg-purple-100 text-purple-800 text-sm font-semibold px-4 py-2 rounded-full">
                                        <i class="fas fa-dot-circle mr-1"></i> Radius: <?php echo $radios; ?>
                                    </span>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div class="bg-purple-50 p-5 rounded-xl">
                                        <h4 class="font-semibold text-purple-700 mb-2 flex items-center">
                                            <i class="fas fa-info-circle mr-2"></i> Shape Information
                                        </h4>
                                        <p class="text-gray-700"><?php echo $c->getFullDescription(); ?></p>
                                    </div>
                                    
                                    <div class="bg-pink-50 p-5 rounded-xl">
                                        <h4 class="font-semibold text-pink-700 mb-2 flex items-center">
                                            <i class="fas fa-calculator mr-2"></i> Area Calculation
                                        </h4>
                                        <div class="text-3xl font-bold text-pink-800 mt-2">
                                            <?php echo $c->area(); ?>
                                            <span class="text-lg font-normal text-gray-600">units²</span>
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">Area = π × Radius²</p>
                                    </div>
                                </div>
                                
                                <div class="flex justify-center mt-4">
                                    <div class="relative w-48 h-48 rounded-full border-4 border-purple-400 bg-gradient-to-r from-purple-100 to-pink-200 flex items-center justify-center">
                                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-4 h-4 bg-purple-600 rounded-full"></div>
                                        <div class="absolute top-1/2 left-1/2 transform -translate-y-1/2 border-t-2 border-dashed border-purple-500 w-24"></div>
                                        <span class="absolute top-1/2 left-1/2 transform translate-x-12 text-sm font-semibold text-purple-800">
                                            r = <?php echo $radios; ?>
                                        </span>
                                        <i class="fas fa-circle text-purple-500 text-4xl opacity-30"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                    } else {
                        ?>
                        <div class="bg-white rounded-2xl shadow-xl p-8 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-red-100 rounded-full mb-6">
                                <i class="fas fa-exclamation-triangle text-red-500 text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Invalid Input</h3>
                            <p class="text-gray-600 mb-6">Please enter valid positive values for all dimensions.</p>
                            <div class="inline-flex items-center space-x-2 text-red-600 bg-red-50 px-6 py-3 rounded-lg">
                                <i class="fas fa-lightbulb"></i>
                                <span>All values must be greater than 0</span>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    ?>
                    <!-- Empty State -->
                    <div class="bg-white rounded-2xl shadow-xl p-10 text-center h-full flex flex-col items-center justify-center">
                        <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-full mb-8">
                            <i class="fas fa-shapes text-blue-500 text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">No Results Yet</h3>
                        <p class="text-gray-600 max-w-md mx-auto mb-8">
                            Enter the dimensions for rectangle and circle in the form, then click "Calculate Shapes" to see the results here.
                        </p>
                        <div class="flex items-center space-x-2 text-blue-600">
                            <i class="fas fa-arrow-left"></i>
                            <span>Fill out the form to get started</span>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <footer class="mt-12 pt-6 border-t border-gray-200 text-center text-gray-500 text-sm">
            <p>Shape Calculator • Created with PHP, Tailwind CSS, and Font Awesome</p>
        </footer>
    </div>
</body>
</html>