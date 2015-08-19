<?php

class WaiverController extends \BaseController {

	public function waiverIndex()
	{
        return View::make('common::waiver.index'
            );
	}

	public function waiverCreate()
	{
        return View::make('common::waiver._form');
	}
    public function waiverStore()
    {
        $data = Input::all();
        if (Waiver::create($data)) {

            return Redirect::back()
                ->with('message', 'Successfully added Information!');
        } else{
            return Redirect::back()
                ->with('message', 'invalid');
        }
    }
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
