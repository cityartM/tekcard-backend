import {useState} from "react";
import {Feature, Plan} from "@/types/pricing";

const usePricing = (plans: Plan[]) => {

  const [filteredPlans, setFilteredPlans] = useState<Plan[]>([]);
  const [filters, setFilters] = useState<{type: 'Client'|'Company', billing: 'Monthly'|'Yearly'}>({
    type: 'Client',
    billing: 'Monthly',
  });

  const handleFilters = (e: any, filterBy: string, filter: string) => {
    e.preventDefault();
    setFilters({
      ...filters,
      [filterBy]: filter,
    });

    filterPlans(filters.type, filters.billing);

  }

  const filterPlans = (type: 'Client'|'Company' = 'Client', billing: 'Monthly'|'Yearly' = 'Monthly') => {
    const filteredPlans = plans.filter((plan) => plan.type === type && plan.duration === billing);
    setFilteredPlans(filteredPlans);
  };

  if (filteredPlans.length === 0) filterPlans();

  console.log( filters, filteredPlans );

  return {filteredPlans, filterPlans, filters, handleFilters};

};

const useFeatues = (features: Feature[]) => {

}

export default usePricing;
