<% if $Title && $ShowTitle %>
    <div class="gallerytitle_holder">
        <h2 class="gallerytitle">$Title</h2>
    </div>
<% end_if %>
<div class="row py-4">
    <% if $Slides.Count > 1 %>
<div class="image-slider">
    <% loop $Slides %>
        <div class="slider_slide">
            <img src="$SlideImage.ScaleWidth(1140).URL" alt="$Title"/>
            <p class="slider_title">$Title</p>
        </div>
    <% end_loop %>
</div>
    <% else %>
        <div class="slide-single">
            <% with $Slides.First %>
                <img src="$SlideImage.ScaleWidth(1140).URL" alt="$Title"/>
            <% end_with %>
        </div>
    <% end_if %>
</div>


