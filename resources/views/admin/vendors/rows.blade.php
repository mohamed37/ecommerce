@foreach($vendors as$index=> $vendor)
<tr>
    <td>{{$index+1}}</td>
    <td>{{$vendor -> name}}</td>
    <td><img style="width: 150px; height: 100px;" src="{{$vendor->logo}}"></td>
    <td>{{$vendor -> mobile}}</td>
    <td>{{$vendor->category->name}} </td>
    <td>{{$vendor->getActive()}}</td>

    <td>
        <div class="btn-group" role="group"
                aria-label="Basic example">
            <a href="{{route('admin.vendors.edit',$vendor -> id)}}"
                class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>


            <a href="{{route('admin.vendors.delete',$vendor -> id)}}"
                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>


            <a href="{{route('admin.vendors.status',$vendor->id)}}"
                class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                @if($vendor -> active == 0)
                    تفعيل
                    @else
                    الغاء تفعيل
                @endif
            </a>


        </div>
    </td>
</tr>
    @endforeach    