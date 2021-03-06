@extends('layouts.admin')
@section('title', Translator::transSmart('app.Update Facility', 'Update Facility'))

@section('styles')
    @parent
@endsection

@section('breadcrumb')
    {{

        Html::breadcrumb(array(

            [URL::getAdvancedLandingIntended('admin::managing::listing::index', null,  URL::route('admin::managing::listing::index', array())), Translator::transSmart('app.Managing', 'Managing'), [], ['title' => Translator::transSmart('app.Managing', 'Managing')]],

            ['admin::managing::property::index', $property->smart_name, ['property_id' => $property->getKey()], ['title' => $property->smart_name]],

            [URL::getAdvancedLandingIntended('admin::managing::facility::item::index', [$property->getKey()],  URL::route('admin::managing::facility::item::index', array('property_id' => $property->getKey()))),  Translator::transSmart('app.Facilities', 'Facilities'), [], ['title' =>  Translator::transSmart('app.Facilities', 'Facilities')]],

             ['admin::managing::facility::item::edit', Translator::transSmart('app.Update Facility', 'Update Facility'), ['property_id' => $property->getKey(), 'id' => $facility->getKey()], ['title' =>  Translator::transSmart('app.Update Facility', 'Update Facility')]]
        ))

    }}

@endsection


@section('content')

    <div class="admin-managing-facility-item-edit">


        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <div class="page-header">
                    <h3>
                        {{Translator::transSmart('app.Update Facility - (%s)', sprintf('Update Facility - (%s)', Utility::constant(sprintf('facility_category.%s.name', $facility->category)), false, ['category' => Utility::constant(sprintf('facility_category.%s.name', $facility->category))]))}}
                    </h3>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                @include('templates.admin.managing.facility.item.form', array('route' => array('admin::managing::facility::item::post-edit', $property->getKey(), $facility->getKey()), 'category' => $facility->category, 'submit_text' => Translator::transSmart('app.Update', 'Update')))

            </div>

        </div>

    </div>

@endsection