<div class="nav-left-sidebar admin">
    <ul>

        @if(Auth::check())

            <li class="photo bright">
                <div class="photo-frame md">
                    <a href="{{URL::current()}}">
                        {{Html::skin('logo.png')}}
                    </a>
                </div>
            </li>


            @php

                $isRoot  = Gate::allows(Utility::rights('root.slug'), \App\Models\Root::class);

            @endphp

            @foreach($admin_module_lists as $module)
                @php
                    $isParentLock = false;
                @endphp
                @if(!$module->status || $module->{$admin_module_model->plural()}->count() <= 0 || !$module->{$admin_module_model->plural()}->first()->pivot->status)
                    @php
                        $isParentLock = true;
                    @endphp
                @endif
                @foreach($module->children as $child)
                    @php
                        $isChildLock = false;
                    @endphp

                    @if($isParentLock || !$child->status || $child->{$admin_module_model->plural()}->count() <= 0 || !$child->{$admin_module_model->plural()}->first()->pivot->status)
                        @php
                            $isChildLock = true;
                        @endphp
                    @endif
                    @can(Utility::rights('read.slug'), [$admin_module_policy, $admin_module_model, $admin_module_model->metaWithQuery->slug, $child->controller])

                        <li>

                            @if(!Route::has(sprintf('%s::%s', $child->alias, 'index')))

                                <a href="javascript:void(0);" title="{{$child->name}}">
                                    <i class="fa fa-fw {{$child->icon}}"></i>
                                    <span>{{$child->name}}</span>
                                </a>

                            @elseif((!$isRoot && $isChildLock))
                                <!--
                                    <a href="javascript:void(0);" title="{{$child->name}}">
                                        <i class="fa fa-fw {{$child->icon}}"></i>
                                        <span>{{$child->name}}</span>
                                        <i class="fa fa-lock"></i>
                                    </a>
                                -->
                            @else
                                {{
                                    Html::linkRouteWithIcon(
                                     sprintf('%s::%s', $child->alias, 'index'),
                                     $child->name,
                                     sprintf('fa-fw %s', $child->icon),
                                     [],
                                     [
                                     'title' => $child->name
                                     ],
                                     true
                                    )
                                }}
                            @endif
                        </li>
                    @endcan
                @endforeach
            @endforeach

        @endif

    </ul>
</div>
