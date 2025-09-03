@extends('driver.layouts.master')

@push('css')
     <style>
       .image-previews-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .image-preview-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 5px;
        width: 100px; 
        text-align: center;
    }

    .image-preview-item img {
        width: 80px; 
        height: 80px; 
        object-fit: cover;
        border-radius: 5px;
    }

    .image-preview-item span {
        font-size: 12px;
        margin-top: 5px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        width: 100%;
    }
    </style>
@endpush

@section('breadcrumb')
    @include('driver.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("driver.dashboard"),
        ]
    ], 'active' => __("Support Tickets")])
@endsection

@section('content')
    <div class="row mb-20-none">
        <div class="col-xl-12 col-lg-12 mb-20">
            <div class="custom-card mt-10">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">{{ __("Add New Ticket") }}</h4>
                </div>
                <div class="card-body">
                    <form class="card-form" action="{{ route('driver.support.ticket.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                         
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => "Subject<span>*</span>",
                                    'name'          => "subject",
                                    'placeholder'   => "Enter Subject...",
                                ])
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                @include('admin.components.form.textarea',[
                                    'label'         => "Message <span>*</span>",
                                    'name'          => "desc",
                                    'placeholder'   => "Write Here…",
                                ])
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __("Attachments") }}<span class='text--base'>(Optional)</span></label>
                                <input type="file" class="file-holder" name="attachment[]" id="attachment" multiple>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12">
                            <button type="submit" class="btn--base w-100">{{ __("Add New") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
<script>
    const fileInput = document.getElementById('attachment');
    const imagePreviewContainer = document.createElement('div');
    imagePreviewContainer.className = 'image-previews-container';
    fileInput.closest('.form-group').appendChild(imagePreviewContainer);

    fileInput.addEventListener('change', (event) => {
        // Clear previous previews 
        // imagePreviewContainer.innerHTML = '';

        const files = event.target.files;
        if (!files) return;

        for (const file of files) {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'image-preview-item';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Uploaded Image';

                    const fileName = document.createElement('span');
                    fileName.textContent = file.name;

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(fileName);
                    imagePreviewContainer.appendChild(imgContainer);
                };

                reader.readAsDataURL(file);
            }
        }
    });
</script>
@endpush