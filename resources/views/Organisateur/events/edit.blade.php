@extends('Organisateur.layout')
@section('title', 'Event Details')
@section('content')

<div class="px-6 py-8">

    <!-- Back Button -->
    <a href="{{ route('organisateur.events.show', $event) }}" class="inline-flex items-center mb-6 text-gray-600 hover:text-gray-800">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Details Event
    </a>
    <form action="{{ route('organisateur.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                <input type="text" name="title" value="{{ $event->title }}" class="w-full px-3 py-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                <input type="date" name="date" value="{{ $event->date }}" class="w-full px-3 py-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                <input type="time" name="time" value="{{ date('H:i', strtotime($event->time)) }}" class="w-full px-3 py-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                <input type="text" name="location" value="{{ $event->location }}" class="w-full px-3 py-2 border rounded-md">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Price</label>
                <input type="number" name="prix" value="{{ $event->prix }}" step="0.01" min="0" class="w-full px-3 py-2 border rounded-md">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Categorie</label>
                <select name="category_id" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>
                <select name="tags[]" id="tags" class="form-control" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Max Participants</label>
                <input type="number" name="max_participants" value="{{ $event->max_participants }}" class="w-full px-3 py-2 border rounded-md">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full px-3 py-2 border rounded-md">{{ $event->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                @if($event->image)
                    <img src="{{ Storage::url($event->image) }}" class="w-32 h-32 object-cover rounded">
                @endif
                <input type="file" name="image" class="mt-2">
            </div>
            @if($event->codePromos)
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                    <div class="grid grid-cols-2 gap-4">

                        <input type="text" name="promo_code" value="{{  $event->codePromos->code  }}" class="px-3 py-2 border rounded-md" placeholder="Promo Code">
                        <input type="number" name="remise" value="{{ $event->codePromos->remise }}" class="px-3 py-2 border rounded-md" placeholder="Discount Percentage">
                        <input type="number" name="nbUtilisation" value="{{ $event->codePromos->nbUtilisation }}" class="px-3 py-2 border rounded-md" placeholder="Number of Uses">
                    </div>
                </div>
            @endif
        </div>


        <div class="mt-6">

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Update Event
            </button>
        </div>
    </form>

</div>

<script>
    var tagSelector = new MultiSelectTag('tags', {
        maxSelection: 5,
        required: true,
        placeholder: 'Search tags',
        onChange: function(selected) {
            console.log('Selection changed:', selected);
        }
    });
</script>
@endsection
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@4.0.1/dist/js/multi-select-tag.min.js"></script>

