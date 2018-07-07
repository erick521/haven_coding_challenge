<table class="table">
    <thead>
    <tr>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
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