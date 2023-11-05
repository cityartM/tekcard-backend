type Feature = {
  id: number;
  name: string;
  display_name: string;
  removable: boolean;
};

type Plan = {
  id: number;
  name: string;
  display_name: string;
  type: string;
  duration: string;
  price: number;
  nbr_user: number;
  nbr_card_user: number;
  removable: boolean;
  features: Feature[];
};

type Pricing = {
  plans: Plan[];
};

type PricingType = {
  pricing: Pricing;
};

export type { Feature, Plan, Pricing, PricingType };
