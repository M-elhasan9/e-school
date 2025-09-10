<div class="testimony-wrap py-4">
    <div class="text">
        <p class="star">
            @for($i = 0; $i < $testimonial->stars; $i++)
                <span class="fa fa-star"></span>
            @endfor
        </p>
        <p class="mb-4">{{ $testimonial->comment }}</p>
        <div class="d-flex align-items-center">
            <div class="user-img" style="background-image: url('{{ $testimonial->image ? asset('storage/'.$testimonial->image) : asset('images/person_placeholder.jpg') }}')"></div>
            <div class="pl-3">
                <p class="name">{{ $testimonial->student_name }}</p>
                <span class="position">{{ $testimonial->position ?? '' }}</span>
            </div>
        </div>
    </div>
</div>
