<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>  
<body class="bg-gray-50">
    
 <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    @include('layout.includes.aside')
 </aside>
 
 <div class="p-4 sm:ml-64">    
    @yield('contenido')    
 </div>
 
 <div class="fixed bottom-0 right-0 mr-4">
   <x-alertas/>           
</div> 
</body>
</html>