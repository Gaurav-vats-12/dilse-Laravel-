

                        <div class='form-row row cusstom_input '>
                            <div class='col-xs-12 required'>
                                <label class='control-label'>Card Number</label>
                                <input  autocomplete='off' class='form-control card-number' size='20'  type='text' name="card_no">
                                @error('card_no')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                            </div>
                        </div>

                        <div class='form-row row cusstom_input'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text' name="cvc">
                                    @error('cvv')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                 <select class="form-control" name="exp_month">
                                                    <option value="">MM</option>
                                                    @foreach(range(1, 12) as $month)
                                                        <option value="{{$month}}">{{$month}}</option>
                                                    @endforeach
                                                </select>
                                                @error('exp_month')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required cusstom_input'>
                                <label class='control-label'>Expiration Year</label>
                               <select class="form-control" name="exp_year">
                                                    <option value="">YYYY</option>
                                                    @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                        <option value="{{$year}}">{{$year}}</option>
                                                    @endforeach
                                                </select>
                                    @error('exp_year')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                            </div>
                        </div>
