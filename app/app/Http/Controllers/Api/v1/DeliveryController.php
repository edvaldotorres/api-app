<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\DeliveryRequest;
use App\Http\Resources\v1\DeliveryResource;
use App\Models\Delivery;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DeliveryController extends Controller
{
    protected $delivery;

    /**
     * This is a constructor function that sets the "delivery" property of an object to the value of the
     * "delivery" parameter passed to it.
     * 
     * @param Delivery delivery The parameter `` is an instance of the `Delivery` class that is
     * being passed to the constructor of another class. The constructor then assigns this instance to the
     * `->delivery` property of the class. This allows the class to access and use the methods and
     * properties of the `Delivery`
     */
    public function __construct(Delivery $delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * This function returns a paginated collection of Delivery resources.
     * 
     * @return AnonymousResourceCollection The `index` function is returning a paginated collection of
     * `DeliveryResource` resources. The `` variable is assigned the result of calling the
     * `simplePaginate` method on the `->delivery` property, which presumably represents a model or
     * repository for deliveries. The `DeliveryResource::collection` method is then called with the
     * `` variable as its argument, which creates
     */
    public function index(): AnonymousResourceCollection
    {
        $deliveries = $this->delivery->simplePaginate(10);
        return DeliveryResource::collection($deliveries);
    }

    /**
     * This PHP function creates a new delivery resource and returns it as a DeliveryResource object.
     * 
     * @param DeliveryRequest request  is an instance of the DeliveryRequest class, which is a
     * custom request class that extends the base Laravel request class. It contains the data submitted by
     * the user for creating a new delivery and also includes validation rules to ensure that the data is
     * valid.
     * 
     * @return DeliveryResource A `DeliveryResource` object is being returned.
     */
    public function store(DeliveryRequest $request): DeliveryResource
    {
        $delivery = $this->delivery->create($request->validated());
        return DeliveryResource::make($delivery);
    }

    /**
     * This PHP function retrieves a delivery resource by its ID and returns it as a DeliveryResource
     * object.
     * 
     * @param int id The "id" parameter is an integer that represents the unique identifier of the delivery
     * that needs to be retrieved. It is used to find the delivery record in the database using the
     * "findOrFail" method.
     * 
     * @return DeliveryResource A `DeliveryResource` object is being returned.
     */
    public function show(int $id): DeliveryResource
    {
        $delivery = $this->delivery->findOrFail($id);
        return DeliveryResource::make($delivery);
    }

    /**
     * This function updates a delivery request with the validated data from the request and returns a
     * DeliveryResource object.
     * 
     * @param DeliveryRequest request  is an instance of the DeliveryRequest class, which is a
     * custom request class that contains validation rules and messages for updating a delivery. It is used
     * to validate the incoming request data before updating the delivery.
     * @param int id The  parameter is an integer that represents the unique identifier of the delivery
     * that needs to be updated. It is used to retrieve the delivery from the database using the findOrFail
     * method.
     * 
     * @return The updated delivery resource is being returned.
     */
    public function update(DeliveryRequest $request, int $id)
    {
        $delivery = $this->delivery->findOrFail($id);
        $delivery->update($request->validated());

        return DeliveryResource::make($delivery);
    }

    /**
     * This PHP function deletes a delivery record by its ID and returns a response with no content.
     * 
     * @param int id The "id" parameter is an integer that represents the unique identifier of the delivery
     * that needs to be deleted. The function uses this parameter to find the delivery using the
     * "findOrFail" method and then deletes it from the database. Finally, the function returns a response
     * with a status code of 204 (
     * 
     * @return a HTTP response with no content (status code 204).
     */
    public function destroy(int $id)
    {
        $delivery = $this->delivery->findOrFail($id);
        $delivery->delete();

        return response()->noContent();
    }
}
