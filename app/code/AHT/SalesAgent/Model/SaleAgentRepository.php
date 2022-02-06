<?php
namespace AHT\SalesAgent\Model;

use AHT\SalesAgent\Api\Data\SaleAgentInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\TemporaryState\CouldNotSaveException;

class SaleAgentRepository implements \AHT\SalesAgent\Api\SaleAgentRepositoryInterface
{

    /**
     * @param AHT\SalesAgent\Model\ResourceModel\SaleAgent\ColectionFactory
     */
    private $colectionFactory;

    /**
     * @param \AHT\SalesAgent\Model\SaleAgentFactory
     */
    private $saleAgentFactory;

    /**
     * @param \AHT\SalesAgent\Model\ResourceModel\SaleAgent
     */
    private $resource;

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \AHT\SalesAgent\Model\ResourceModel\SaleAgent\CollectionFactory $colectionFactory,
        \AHT\SalesAgent\Model\SaleAgentFactory $saleAgentFactory,
        \AHT\SalesAgent\Model\ResourceModel\SaleAgent $resource
    ) {
        $this->colectionFactory = $colectionFactory;
        $this->saleAgentFactory = $saleAgentFactory;
        $this->resource = $resource;
        
    }

    public function save(\AHT\SalesAgent\Api\Data\SaleAgentInterface $saleAgent)
    {
        try {
            $this->resource->save($saleAgent);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return $saleAgent;
        
    }
    
    public function getById(string $id)
    {
        $postId = intval($id);
        $Post = $this->PostFactory->create();
        $Post->load($postId);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $postId));
        }
        $result = $Post;
        return $result;
    }
    public function getList()
    {
        $collection = $this->colectionFactory->create();
        return $collection->getData();
    }
    public function create(SaleAgentInterface $saleAgent)
    {
        try {
            $this->resource->save($saleAgent);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return json_encode(array(
            "status" => 200,
            "message" => $saleAgent->getData()
        ));
    }
    public function update(string $id, SaleAgentInterface $saleAgent)
    {
        try {
            $objSaleAgent = $this->saleAgentFactory->create();
            $id = intval($id);
            $objSaleAgent->setId($id);
            //Set full collum
            $objSaleAgent->setData($saleAgent->getData());
            $this->resource->save($objSaleAgent);

            return $objSaleAgent->getData();
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
    }
    public function deleteById($saleAgentId)
    {
        $id = intval($saleAgentId);
        if($this->resource->delete($this->getById($id))) {
            return json_encode([
                "status" => 200,
                "message" => "Successfully"
            ]);
        }
    }
}
