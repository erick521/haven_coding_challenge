<table class="table">
    <thead>
    <tr>
        <th scope="col">
                @if($sort["column"] == 'first_name')
                    @if($sort["order"] == 'asc')
                    <a href="{{url("sort/first_name/desc")}}">First Name
                        <i class="fa fa-sort-up"></i>
                    </a>
                    @else
                        <a href="{{url("sort/first_name/asc")}}">First Name
                            <i class="fa fa-sort-down"></i>
                        </a>
                    @endif
                @else
                    <a href="{{url("sort/first_name/asc")}}">First Name
                        <i disabled class="fa fa-sort"></i>
                    </a>
                @endif
        </th>
        <th scope="col">
            @if($sort["column"] == 'last_name')
                @if($sort["order"] == 'asc')
                    <a href="{{url("sort/last_name/desc")}}">Last Name
                        <i class="fa fa-sort-up"></i>
                    </a>
                @else
                    <a href="{{url("sort/last_name/asc")}}">Last Name
                        <i class="fa fa-sort-down"></i>
                    </a>
                @endif
            @else
                <a href="{{url("sort/last_name/asc")}}">Last Name
                    <i class="fa fa-sort"></i>
                </a>
            @endif
        </th>
        <th scope="col">
            @if($sort["column"] == 'email')
                @if($sort["order"] == 'asc')
                    <a href="{{url("sort/email/desc")}}">Email
                        <i class="fa fa-sort-up"></i>
                    </a>
                @else
                    <a href="{{url("sort/email/asc")}}">Email
                        <i class="fa fa-sort-down"></i>
                    </a>
                @endif
            @else
                <a href="{{url("sort/email/asc")}}">Email
                    <i class="fa fa-sort"></i>
                </a>
            @endif
        </th>
        <th scope="col">Options</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contacts as $contact)
        <tr>
            <td>{{$contact["first_name"]}}</td>
            <td>{{$contact["last_name"]}}</td>
            <td>{{$contact["email"]}}</td>
            <td style="vertical-align: middle;">
                <a title="View Details..."><button class="btn btn-outline-secondary btn-sm" onclick="showContactDetails(this);" data-contact="{{$contact}}"><i class="fa fa-info"></i></button></a>
                <a title="Edit..."><button class="btn btn-outline-secondary btn-sm" onclick="showContactForm(this);" data-contact="{{$contact}}"><i class="fa fa-edit"></i></button></a>
                <a title="Delete..."><button class="btn btn-outline-secondary btn-sm" onclick="deleteContact(this);" data-id="{{$contact["id"]}}"><i class="fa fa-times"></i></button></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>