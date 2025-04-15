@extends('Admin.layout')
@section('title', 'Categories')
@section('content')

<main>
    <div class="head-title">
        <div class="left">
            <h1>Catégories</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Catégories</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download' ></i>
            <span class="text">Download PDF</span>
        </a>
    </div>
    <div class="max-w-3xl mx-auto ">

      <div class="bg-white p-6 rounded-lg shadow mt-8 mb-6">
        <form id="categoryForm" class="flex flex-col sm:flex-row gap-4" action="{{ route('admin.categorie.store') }}" method="POST">
            @csrf
          <input
            type="text"
            name="category_name"
            id="categoryInput"
            placeholder="Enter category name"
            aria-label="Category name"
            class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
            required
          >
          <input type="hidden" id="editIndex" value="-1">
          <div class="flex gap-2">
            <button
              type="submit"
              id="submitButton"
              class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
            >
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke-width="2"></circle>
                <line x1="12" y1="8" x2="12" y2="16" stroke-width="2"></line>
                <line x1="8" y1="12" x2="16" y2="12" stroke-width="2"></line>
              </svg>
              Add Category
            </button>

          </div>
        </form>
      </div>
      <!-- Table of categories -->

      <div class="bg-white rounded-lg shadow mb-6 overflow-hidden mt-8">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category Name</th>
              <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody id="categoryTableBody" class="bg-white divide-y divide-gray-200">
            @foreach ($categories as $categorie)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $categorie->nom }}</td>
                <input type="hidden" id="categoryId" value="{{ $categorie->id }}">
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                  <a href="#" onclick="edit(event)" class="text-blue-600 hover:text-blue-800 mr-4 inline-flex items-center">
                    <i class='bx bx-edit-alt text-xl'></i>
                  </a>
                  <form action="{{ route('admin.categorie.destroy', $categorie) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 inline-flex items-center" style="background:none; border:none; padding:0;">
                        <i class='bx bx-trash text-xl'></i>
                    </button>
                </form>

                </td>
              </tr>
            @endforeach

            <!-- Table rows will be inserted here by JavaScript -->
          </tbody>
        </table>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
        <div id="emptyMessage" class="px-6 py-4 text-center text-sm text-gray-500" style="display: none;">
          No categories found. Add your first category below.
        </div>
      </div>

      <!-- Form to add/edit category -->

    </div>
  </main>

<script>
    function edit(e){
        const data=e.target.parentElement.parentElement.parentElement.children[0].innerText;
        const dataId=e.target.parentElement.parentElement.parentElement.children[1].value;
        const categoryInput=document.getElementById('categoryInput');
        categoryInput.value=data;
        const submitButton=document.getElementById('submitButton');
        submitButton.innerText="edit category";
        const form=document.getElementById('categoryForm');
        form.action = "{{ route('admin.categorie.update', '') }}/" + dataId;

    }
</script>

@endsection



