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
        <div class="slide-single slider_slide">
            <% with $Slides.First %>
                <img src="$SlideImage.ScaleWidth(1140).URL" alt="$Title"/>
                <p class="slider_title vert-$PositionVertical horiz-$PositionHorizontal<% if $TextDropShadow %> dropshadow<% end_if %>"
                   style="color: #{$TextColour}">$Title</p>
            <% end_with %>
        </div>
    <% end_if %>
</div>
