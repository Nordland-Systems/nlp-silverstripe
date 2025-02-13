<div class="section section--chronic">
    <div class="section_content">
        <% if $ShowTitle %>
            <div class="section_title">
                <h2>$Title</h2>
            </div>
        <% end_if %>
        <div class="section_list">
            <% loop $TimelineItems %>
            <div class="list_item <% if Up.IsCollapsible %><% else %>list_item--visible<% end_if %>">
                    <div class="list_item_timeline">
                        <span class="circle"></span>
                        <span class="line"></span>
                    </div>
                    <div class="list_item_content">
                        <% if Up.IsCollapsible %>
                            <a class="list_item_content_date" href="" data-behaviour="list-toggle">
                                <h4>$Year</h4>
                            </a>
                            <a class="list_item_content_title" href="" data-behaviour="list-toggle">
                                <h3>$Headline</h3>
                            </a>
                            <div class="list_item_content_text" data-behaviour="list-toggle-text">
                                $Text
                            </div>
                        <% else %>
                            <div class="list_item_content_date" href="">
                                <h4>$Year</h4>
                            </div>
                            <div class="list_item_content_title">
                                <h3>$Headline</h3>
                            </div>
                            <div class="list_item_content_text">
                                $Text
                            </div>
                        <% end_if %>
                    </div>
                </div>
            <% end_loop %>
        </div>
    </div>
</div>
